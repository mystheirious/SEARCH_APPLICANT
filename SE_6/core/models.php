<?php  

require_once 'dbConfig.php';

function getAllApplicants($pdo) {
	$sql = "SELECT * FROM search_applicant
			ORDER BY first_name ASC";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getApplicantByID($pdo, $id) {
	$sql = "SELECT * from search_applicant WHERE id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$id]);

	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function getAppliByID($pdo, $id) {
	$sql = "SELECT * from search_applicant WHERE id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$id]);

    if ($executeQuery) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return [];
}


function searchForAnApplicant($pdo, $searchQuery) {
	
	$sql = "SELECT * FROM search_applicant WHERE 
			CONCAT(first_name, last_name, license_number, gender, age, email, contact_number, address, date_added) 
			LIKE ?";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute(["%".$searchQuery."%"]);
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}



function insertNewApplicant($pdo, $first_name, $last_name, $license_number, 
    $gender, $age, $email, $contact_number, $address, $added_by) {

    $response = array();

    $sql = "INSERT INTO search_applicant
            (
                first_name,
                last_name,
                license_number,
                gender,
                age,
                email,
                contact_number,
                address,
                added_by
            )
            VALUES (?,?,?,?,?,?,?,?,?)";

    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([
        $first_name, $last_name, $license_number, 
        $gender, $age, $email, 
        $contact_number, $address, $added_by,
    ]);

    if ($executeQuery) {
        $response = array(
            "status" => "200",
            "message" => "Applicant successfully inserted!"
        );
    } else {
        $response = array(
            "status" => "400",
            "message" => "An error occurred while inserting the applicant."
        );
    }

    return $response;
}

function editApplicant($pdo, $first_name, $last_name, $license_number, 
    $gender, $age, $email, $contact_number, $address, $id, $modified_by) {

    $response = array();

    $sql = "UPDATE search_applicant
                SET first_name = ?,
                    last_name = ?,
                    license_number = ?,
                    gender = ?,
                    age = ?,
                    email = ?,
                    contact_number = ?,
                    address = ?,
                    modified_by = ?
                WHERE id = ?";

    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([
        $first_name, $last_name, $license_number, 
        $gender, $age, $email, 
        $contact_number, $address, $modified_by, $id
    ]);

    if ($executeQuery) {
        $response = array(
            "status" => "200",
            "message" => "Applicant successfully edited!"
        );
    } else {
        $response = array(
            "status" => "400",
            "message" => "An error occurred while editing the applicant."
        );
    }

    return $response;
}


function deleteApplicant($pdo, $id) {
	$sql = "DELETE FROM search_applicant 
			WHERE id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$id]);

	if ($executeQuery) {
		return true;
	}
}



function checkIfUserExists($pdo, $username) {
	$response = array();
	$sql = "SELECT * FROM user_accounts WHERE username = ?";
	$stmt = $pdo->prepare($sql);

	if ($stmt->execute([$username])) {

		$userInfoArray = $stmt->fetch();

		if ($stmt->rowCount() > 0) {
			$response = array(
				"result"=> true,
				"status" => "200",
				"userInfoArray" => $userInfoArray
			);
		}

		else {
			$response = array(
				"status" => "400",
				"message"=> "User doesn't exist from the database"
			);
		}
	}

	return $response;

}

function insertNewUser($pdo, $username, $first_name, $last_name, $password) {
	$response = array();
	$checkIfUserExists = checkIfUserExists($pdo, $username); 

	if (!$checkIfUserExists['result']) {

		$sql = "INSERT INTO user_accounts (username, first_name, last_name, password) 
		VALUES (?,?,?,?)";

		$stmt = $pdo->prepare($sql);

		if ($stmt->execute([$username, $first_name, $last_name, $password])) {
			$response = array(
				"status" => "200",
				"message" => "User successfully inserted!"
			);
		}

		else {
			$response = array(
				"status" => "400",
				"message" => "An error occured with the query!"
			);
		}
	}

	else {
		$response = array(
			"status" => "400",
			"message" => "User already exists!"
		);
	}

	return $response;
}

function getUserIDByUsername($pdo, $username) {
	$sql = "SELECT user_id FROM user_accounts WHERE username =?";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$username]); 
	$row = $stmt->fetch();
	return $row ? $row['user_id'] : null;
}

function validatePassword($password) {
    if (strlen($password) >= 8) {
        $hasLower = false;
        $hasUpper = false;
        $hasNumber = false;

        for ($i = 0; $i < strlen($password); $i++) {
            if (ctype_lower($password[$i])) {
                $hasLower = true;
            } elseif (ctype_upper($password[$i])) {
                $hasUpper = true;
            } elseif (ctype_digit($password[$i])) {
                $hasNumber = true;
            }

            if ($hasLower && $hasUpper && $hasNumber) {
                return true;
            }
        }
    }

    return false;
}

?>