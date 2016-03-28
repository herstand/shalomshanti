<?php

abstract class DBService {
  const SELECT = 1;
  const INSERT = 2;
  const UPDATE = 3;

  protected function query($queryType, $table, $data) {
    switch ($queryType) {
      case self::SELECT:
        return $this->runSelect($table, $data);
      case self::INSERT:
        return $this->runInsert($table, $data);
      case self::UPDATE:
        return $this->runUpdate($table, $data);
    }
  }

  /*
    Run select query, expecting single row response
  */
  private function runSelect($table, $data) {
    $query = "SELECT ".implode(", ", $data['COLUMNS'])." FROM {$table} ";

    if (isset($data['WHERE'])) {
     $query .=  "WHERE {$data['WHERE']}";
    }
    $result = $this->mysqli->query($query) or trigger_error($this->mysqli->error."[$query]");
    if ($result->num_rows === 0) {
      throw new Exception();
    }
    return $result->fetch_array(MYSQLI_ASSOC);
  }

  private function runInsert($table, $data) {
    $query = "INSERT INTO `{$table}` (".implode(", ",$data['COLUMNS']).")
      VALUES (".implode(", ",$data['VALUES']).")";

    $result = $this->mysqli->query($query) or trigger_error($this->mysqli->error."[$query]");
    return $mysqli->insert_id;
  }

  private function runUpdate($table, $data) {
    $setContent = "";
    foreach ($data["SET"] as $key => $value) {
      $setContent .= "`{$key}` = \"{$value}\" ";
    }
    $query = "UPDATE {$table}
      SET {$setContent}
      WHERE {$data["WHERE"]}
    ";
    $result = $this->mysqli->query($query) or trigger_error($this->mysqli->error."[$query]");
  }

  protected function validateInput($table, $input, $column) {
    $query = "SELECT `DATA_TYPE`, `CHARACTER_MAXIMUM_LENGTH`
      FROM INFORMATION_SCHEMA.COLUMNS
      WHERE table_name = '{$table}' AND
      COLUMN_NAME = '{$column}'";
    $result = $this->mysqli->query($query) or trigger_error($this->mysqli->error."[$query]");
    $row = $result->fetch_array(MYSQLI_ASSOC);
    if ($this->inputIsValid($input, $row['DATA_TYPE'], $row['CHARACTER_MAXIMUM_LENGTH'])) {
      $cleaner = "clean_{$row['DATA_TYPE']}";
      return $this->$cleaner($input);
    } else {
      throw new Exception(
        "Input [{$input}] is not valid for column `{$column}` of type {$row['DATA_TYPE']}."
      );
    }
  }

  protected function inputIsValid($input, $type, $len) {
    switch ($type) {
      case "int":
      case "smallint":
        return is_int($input);
      case "tinyint":
        return is_bool($input);
      case "varchar":
      case "text":
        return is_string($input) &&
          strlen($input) < $len;
    }
  }

  protected function clean_int($input) {
    return intval($input);
  }
  protected function clean_smallint($input) {
    return clean_int($input);
  }
  protected function clean_tinyint($input) {
    return (bool)$input;
  }
  protected function clean_string($input) {
    return $this->mysqli->real_escape_string($input);
  }
  protected function clean_varchar($input) {
    return $this->clean_string($input);
  }
  protected function clean_text($input) {
    return $this->clean_string($input);
  }

}

?>
