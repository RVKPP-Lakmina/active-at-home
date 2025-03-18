<?php
class Api
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function get($table, $id = null)
    {
        $query = "SELECT * FROM $table";

        if ($id) {
            $query .= " WHERE id = ?";
        }

        $stmt = $this->conn->prepare($query);

        if ($id) {
            $stmt->bind_param("i", $id);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function post($table, $data)
    {
        $keys = implode(", ", array_keys($data));
        $placeholders = implode(", ", array_fill(0, count($data), "?"));
        $query = "INSERT INTO $table ($keys) VALUES ($placeholders)";

        $stmt = $this->conn->prepare($query);

        $types = str_repeat("s", count($data)); // Assuming all data is strings (adjust if needed)
        $stmt->bind_param($types, ...array_values($data));

        if ($stmt->execute()) {
            return $this->conn->insert_id;
        } else {
            return false;
        }
    }

    public function put($table, $id, $data)
    {
        $set = implode(", ", array_map(fn($key) => "$key = ?", array_keys($data)));
        $query = "UPDATE $table SET $set WHERE id = ?";

        $stmt = $this->conn->prepare($query);

        $types = str_repeat("s", count($data)) . "i"; // All fields + ID as integer
        $values = array_values($data);
        $values[] = $id;

        $stmt->bind_param($types, ...$values);

        return $stmt->execute();
    }

    public function delete($table, $id)
    {
        $query = "DELETE FROM $table WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }
}
