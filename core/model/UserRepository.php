<?php

require_once '/Applications/MAMP/htdocs/personal_blog/core/config/db_config.php';
require_once 'User.php';

class UserRepository
{
    //private $id;
    private $users = [];
    private $db;

    public function __construct(mysqli $db)
    {
        $this->db = $db;
    }

    public function verifyUser($email)
    {
        $sql = "SELECT id FROM users WHERE email = ?";

        if ($stmt = $this->db->prepare($sql)) {
            // Set parameters
            $param_email = $email;

            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_email);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // store result
                $stmt->store_result();

                if ($stmt->num_rows == 1) {
                    return true;
                } else {
                    return false;
                }
            } else {
                echo $err = "Qualcosa è andato storto riprova dopo.";
            }
        }
        $stmt->close();
    }

    public function getUserByEmail($email)
    {
        if ($this->verifyUser($email)) {

            $sql = "SELECT * FROM users WHERE email = ?";

            if ($stmt = $this->db->prepare($sql)) {
                $param_email = $email;
                $stmt->bind_param("s", $param_email);
                if ($stmt->execute()) {
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();
                    $user = new User($row['email'], $row['password'], $row['username'], $row['role']);
                    $user->setId($row['id']);
                    return $user;
                } else {
                    echo "esecuzione fallita";
                }
            } else {
                echo "prepare fallito";
            }
        } else {
            echo $err = "utente non esistente \n";
        }
    }
    

    public function getAllUser()
    {
        $sql = "SELECT * FROM users";
        $users = [];

        if ($stmt = $this->db->prepare($sql)) {
            if ($stmt->execute()) {
                $result = $stmt->get_result();

                while ($row = $result->fetch_assoc()) {
                    $user = new User($row['email'], $row['password'], $row['username'], $row['role']);
                    $user->setId($row['id']);
                    $users[] = $user;
                }

                return $users;
            } else {
                echo "esecuzione fallita\n";
            }
        } else {
            echo "prepare fallito \n";
        }
    }

    public function addUser(User $user)
    {
        if (!$this->verifyUser($user->getEmail())) {
            $sql = "INSERT INTO users (email, password, username, role) VALUES (?, ?, ?, ?)";

            if ($stmt = $this->db->prepare($sql)) {
                // Set parameters
                $param_email = $user->getEmail();
                $param_password = password_hash($user->getPassword(), PASSWORD_DEFAULT); // Creates a password hash
                $param_username = $user->getName();
                $param_role = $user->getRole();

                // Bind variables to the prepared statement as parameters
                $stmt->bind_param("ssss", $param_email, $param_password, $param_username, $param_role);

                // Attempt to execute the prepared statement
                if ($stmt->execute()) {
                    // Redirect to login page
                    return true;
                } else {
                    return false;
                }
            }
            // Close statement
            $stmt->close();
        } else {
            return false;
        }
    }

    public function deleteUser($email)
    {
        if ($this->verifyUser($email)) {
            $sql = "DELETE FROM users WHERE email = ?";

            if ($stmt = $this->db->prepare($sql)) {
                // Set parameters
                $param_email = $email;

                // Bind variables to the prepared statement as parameters
                $stmt->bind_param("s", $param_email);

                // Attempt to execute the prepared statement
                if ($stmt->execute()) {
                    return true;
                } else {
                    echo $err = "non è stato possibile eseguire la query";
                }
            } else {
                echo $err = "impossibile preparare la sql";
            }
        } else {
            echo $err = "Utente non verificato";
        }
    }
}
