<?php
namespace app\services;

use app\transfer\User;
use app\transfer\VisitReason;
use app\transfer\Doctor;
use core\App;
use DateTime;
use app\transfer\Appointment;
use core\Utils;

class DatabaseUtils{
	public static function DB_toDateTime($datetime_str) {
       $format = 'Y-m-d H:i:s';
       $dateTime = DateTime::createFromFormat($format, $datetime_str);
       return $dateTime;
    }

    public static function DB_DateTimeToString($datetime) {
       $format = 'Y-m-d H:i:s';
       return $datetime->format($format);
    }

    public static function DB_NowToString() {
       return date('Y-m-d H:i:s');
    }

    public static function getVisitReasons($onlyEnabled = false): array{
        try {
            $where = ['ORDER' => ['visit_reason.name_visit_reason' => 'ASC']];
            if ($onlyEnabled) {
                $where['visit_reason.is_enable'] = 1;
            }
            return array_map(
            function($visitReason) { return new VisitReason($visitReason); },
            App::getDB()->select('visit_reason', [
                'visit_reason.id_visit_reason(visitReasonId)',
                'visit_reason.name_visit_reason(visitReasonName)',
                'visit_reason.is_enable(isEnable)'
            ], $where));
        } catch (\Exception $e) {
            Utils::addErrorMessage("Wystąpił błąd podczas wczytywania przyczyn wizyt.");
            return [];
        }
    }

	public static function getDoctors($includeDescription = false, $includeSpecializations = false): array{
		try {
			$joins = [
				'[><]role_user' => ['id_user' => 'id_user'],
				'[><]role' => ['role_user.id_role' => 'id_role']
			];
			
			$columns = [
				'system_user.id_user(id)',
				'system_user.name_user(name)',
				'system_user.surname',
				'system_user.photo_url(photourl)'
			];
			
			if ($includeSpecializations) {
				$joins['[>]doctor_specialization'] = ['id_user' => 'id_doctor'];
				$joins['[>]specialization'] = ['doctor_specialization.id_specialization' => 'id_specialization'];
				$columns['specializations'] = App::getDB()->raw('GROUP_CONCAT(DISTINCT specialization.name_specialization ORDER BY specialization.name_specialization SEPARATOR \', \')');
			}
			
			if ($includeDescription) {
				$joins['[>]doctor_info'] = ['id_user' => 'id_user'];
				$columns[] = 'doctor_info.description';
			}
			
			return array_map(
				function($doctor) { return new Doctor($doctor); },
				App::getDB()->select('system_user', $joins, $columns, [
					'role.name_role' => 'doctor',
					'GROUP' => 'system_user.id_user',
					'role_user.withdrawal_datetime' => null,
					'ORDER' => ['system_user.surname' => 'ASC', 'system_user.name_user' => 'ASC'],
				])
			);
		} catch (\Exception $e) {
            Utils::addErrorMessage("Wystąpił błąd podczas wczytywania listy lekarzy." . $e->getMessage());
			return [];
		}
	}

    public static function getPatients($onlyActive = false): array{
        try {
            $where = [
                'role.name_role' => 'patient',
                'role_user.withdrawal_datetime' => null,
                'ORDER' => ['system_user.surname' => 'ASC', 'system_user.name_user' => 'ASC']
            ];
            if ($onlyActive) {
                $where['status.name_status'] = 'active';
            }
            return array_map(
                function($patient) { return new User($patient); },
                App::getDB()->select('system_user', [
                    '[><]role_user' => ['id_user' => 'id_user'],
                    '[><]role' => ['role_user.id_role' => 'id_role'],
                    '[>]user_account_status(status)' => ['id_status' => 'id_status']
                ], [
                    'system_user.id_user(id)',
                    'system_user.name_user(name)',
                    'system_user.surname',
                    'system_user.pesel',
                    'status.name_status(status)'
                ], $where)
            );
        } catch (\Exception $e) {
            Utils::addErrorMessage("Wystąpił błąd podczas wczytywania listy pacjentów.");
            return [];
        }
    }

	public static function getReceptionists(): array{
		try {
			return array_map(
				function($user) { return new User($user); },
				App::getDB()->select('system_user', [
					'[><]role_user' => ['id_user' => 'id_user'],
					'[><]role' => ['role_user.id_role' => 'id_role'],
					'[>]user_account_status(status)' => ['id_status' => 'id_status']
				], [
					'system_user.id_user(id)',
					'system_user.name_user(name)',
					'system_user.surname',
					'system_user.login',
					'status.name_status(status)'
				], [
					'role.name_role' => 'receptionist',
					'role_user.withdrawal_datetime' => null,
					'ORDER' => ['system_user.surname' => 'ASC', 'system_user.name_user' => 'ASC']
				])
			);
		} catch (\Exception $e) {
            Utils::addErrorMessage("Wystąpił błąd podczas wczytywania listy recepcjonistów.");
			return [];
		}
	}

    public static function cancellAppointment($id){
        try {
            App::getDB()->update('appointment', [
                'patient_id_user' => null,
                'id_visit_reason' => null,
                'reserved_by_id_user' => null,
                'custom_visit_reason' => null,
                'reservation_datetime' => null,
                'is_available' => true
            ], [
                'id_appointment' => $id
            ]);
        } catch (\Exception $e) {
            Utils::addErrorMessage("Wystąpił błąd podczas anulowania wizyty.");
        }
    }

    public static function getDoctorsAvailableAppointments($doctorId){
        try {
            return array_map(
                function ($appointment) { return new Appointment($appointment);},
                App::getDB()->select('appointment',
                [
                    'id_appointment(id)',
                    'start_datetime(startDatetime)',
                    'end_datetime(endDatetime)'
                ], [
                    'start_datetime[>]' => self::DB_NowToString(),
                    'is_available' => (int)true,
                    'id_doctor' => $doctorId,
                    'ORDER' => ['start_datetime' => 'ASC']
                ]));
        } catch (\Exception $e) {
            Utils::addErrorMessage("Wystąpił błąd podczas wczytywania dostępnych terminów.");
            return [];
        }
    }

	public static function getRoleIdByName($roleName){
		try {
			return App::getDB()->get('role', 'id_role', [
					'name_role' => $roleName
				]);
		} catch (\Exception $e) {
            Utils::addErrorMessage("Wystąpił błąd podczas pobierania informacji o roli.");
			return null;
		}
	}

    public static function getAppointments($patientId = null, $doctorId = null, $avaiable = null, $dateTimeFrom = null, $dateTimeTo = null, $limit = null, $offset = 0, &$isMore = false, $doctorNameLike = null, $patientNameLike = null): array{
        $where = [
			'ORDER' => ['appointment.start_datetime' => 'ASC', 'office.name_office' => 'ASC']
		];

		if($patientId !== null){
			$where['appointment.patient_id_user'] = $patientId;
		}
		else if(!Utils::isEmptyString($patientNameLike)){
			$tab = explode(' ', $patientNameLike);
			if(!Utils::isEmptyString($tab[0])){
				$name = trim($tab[0]) . '%';
				$where['OR']['patient.name_user[~]'] = $name;

			}
			if(count($tab) > 1 && !Utils::isEmptyString($tab[1])){
				$name = trim($tab[1]) . '%';
				$where['OR']['patient.surname[~]'] = $name;
			}
			else {
				$name = trim($patientNameLike) . '%';
				$where['OR']['patient.name_user[~]'] = $name;
				$where['OR']['patient.surname[~]'] = $name;
			}
		}
		if($doctorId !== null){
			$where['appointment.id_doctor'] = $doctorId;
		}
		else if(!Utils::isEmptyString($doctorNameLike)){
			$tab = explode(' ', $doctorNameLike);
			if(!Utils::isEmptyString($tab[0])){
				$name = trim($tab[0]) . '%';
				$where['OR']['doctor.name_user[~]'] = $name;

			}
			if(count($tab) > 1 && !Utils::isEmptyString($tab[1])){
				$name = trim($tab[1]) . '%';
				$where['OR']['doctor.surname[~]'] = $name;
			}
			else {
			$name = trim($doctorNameLike) . '%';
				$where['OR']['doctor.name_user[~]'] = $name;
				$where['OR']['doctor.surname[~]'] = $name;
			}
		}
		if($avaiable !== null){
			$where['appointment.is_available'] = $avaiable;
		}
		if($dateTimeFrom !== null){
			$where['appointment.start_datetime[>=]'] = $dateTimeFrom;
		}
		if($dateTimeTo !== null){
			$where['appointment.end_datetime[<=]'] = $dateTimeTo;
		}
		if($limit !== null){
			$where['LIMIT'] = [$offset, $limit + 1]; // Pobierz o jeden więcej, aby sprawdzić, czy jest więcej wyników
		}

		try{
			$appointments = App::getDB()->select('appointment', [
				'[>]system_user(patient)' => ['patient_id_user' => 'id_user'],
                '[>]system_user(doctor)' => ['id_doctor' => 'id_user'],
				'[>]office' => ['appointment.id_office' => 'id_office'],
				'[>]visit_reason' => ['id_visit_reason'=>'id_visit_reason']
			], [
				'appointment.id_appointment(id)',
				'patient.name_user(name)',
				'patient.surname',
				'patient.pesel',
				'appointment.reservation_datetime(reservationDatetime)',
				'visitReason' => App::getDB()->raw('CASE WHEN appointment.id_visit_reason IS NOT NULL THEN visit_reason.name_visit_reason ELSE appointment.custom_visit_reason END'),
				'selfReserved' => App::getDB()->raw('CASE WHEN appointment.reserved_by_id_user = appointment.patient_id_user THEN 1 ELSE 0 END'),
				'appointment.start_datetime(startDatetime)',
				'appointment.end_datetime(endDatetime)', 
				'appointment.is_available',
				'appointment.id_doctor(doctorId)',
                'doctor.name_user(doctorName)',
                'doctor.surname(doctorSurname)',
				'office.name_office(officeName)'

			], $where);
            $array = array_map(function($appointment) { return new Appointment($appointment); }, $appointments);
			if($limit !== null){
				if(count($array) > $limit){
					$isMore = true;
					array_pop($array); // Usuń dodatkowy rekord użyty do sprawdzenia isMore
				} else {
					$isMore = false;
				}
			}
			return $array;
		} catch (\PDOException $e){
			Utils::addErrorMessage("Wystąpił błąd podczas wczytywania wizyt.");
            return [];
		}
        
    }
}

