<?php

function tableHasData($conn, $table)
{
    $result = $conn->query("SELECT COUNT(*) as count FROM $table");
    $row = $result->fetch_assoc();
    return $row['count'] > 0;
}

function pre_initialize($database)
{
    $queries  = [
        "CREATE TABLE IF NOT EXISTS Activities (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE,
    brief_description TEXT NOT NULL,
    benefits TEXT NOT NULL,
    price VARCHAR(50) NOT NULL
);",

        "CREATE TABLE IF NOT EXISTS Trainers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    location VARCHAR(100) NOT NULL,
    certifications VARCHAR(50) NOT NULL,
    years_experience INT NOT NULL
);",
    ];


    foreach ($queries as $query) {
        if ($database->query($query) === TRUE) {
        }
    }

    // Insert data into Activities if empty
    if (!tableHasData($database, "Activities")) {
        $database->query("INSERT INTO Activities (name, brief_description, benefits, price) VALUES
        ('Fitness', 'General fitness activities encompass a wide range of exercises...', 
        'Improves cardiovascular health...', 'From £30 per hour'),
        ('Strength Training', 'Strength training involves using resistance...', 
        'Builds muscle mass...', 'From £50 per 45 minutes'),
        ('Yoga', 'Mind-body practice that combines physical postures...', 
        'Improves flexibility and balance...', 'From £35 per 45 minutes'),
        ('Pilates', 'Low-impact exercise that focuses on strengthening muscles...', 
        'Strengthens core muscles...', 'From £30 per 45 minutes')");
    }

    // Insert data into Trainers if empty
    if (!tableHasData($database, "Trainers")) {
        $database->query("INSERT INTO Trainers (name, email, location, certifications, years_experience) VALUES
        ('Mary Brown', 'mary@may.com', 'NW3 only', 'Level 3', 3),
        ('James White', 'james@james.com', 'SW1 and online', 'Level 3', 5),
        ('Ann Blue', 'ann@ann.com', 'online', 'ISSA', 5),
        ('Peter Red', 'peter@peter.com', 'NW2, NW3', 'Level 4', 4)");
    }
}
