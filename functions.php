<?php

function get_column_query($table_name, $column_name) {
    global $wpdb;

    $query = $wpdb->get_results("SHOW CREATE TABLE $table_name", ARRAY_N);

    foreach ($query as $row) {
        foreach ($row as $create_table_query) {
            if (strpos($create_table_query, "`$column_name`") !== false) {
                return $create_table_query;
            }
        }
    }

    return "Column not found.";
}

$table_name = $wpdb->prefix . "your_table_name"; // Replace "table_name" with the actual table name
$column_name = "your_column_name"; // Replace "column_name" with the actual column name
$column_query = get_column_query($table_name, $column_name);

var_dump($column_query);
