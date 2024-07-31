<?php
include '../connection.php';

header('Content-Type: application/json');

session_start();
if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
    echo json_encode(['success' => false, 'error' => 'User session not found.']);
    exit;
}

// Fetch appointments
$sqlAppointments = "SELECT a.appoid, a.pid, p.pname AS patient_name, a.apponum, a.scheduleid, s.title AS schedule_title, a.appodate 
                    FROM appointment a
                    JOIN patient p ON a.pid = p.pid
                    JOIN schedule s ON a.scheduleid = s.scheduleid";
$resultAppointments = $database->query($sqlAppointments);
$appointments = $resultAppointments->fetch_all(MYSQLI_ASSOC);

// Fetch approvisionnement
$sqlApprovisionnement = "SELECT a.apid, a.mid, m.nom AS medoc_name, a.qte, a.prix, a.date_app 
                        FROM approvisionnement a
                        JOIN medoc m ON a.mid = m.mid";
$resultApprovisionnement = $database->query($sqlApprovisionnement);
$approvisionnement = $resultApprovisionnement->fetch_all(MYSQLI_ASSOC);

// Fetch doctors
$sqlDoctors = "SELECT d.docid, d.docemail, d.docname, d.docpassword, d.docnic, d.doctel, s.sname AS specialty_name, d.profile, d.statut 
                FROM doctor d
                JOIN specialties s ON d.specialties = s.id";
$resultDoctors = $database->query($sqlDoctors);
$doctors = $resultDoctors->fetch_all(MYSQLI_ASSOC);

// Fetch medocs
$sqlMedocs = "SELECT m.mid, m.nom, m.description, m.date_exp, m.prix, m.qte, m.dosage, m.fab 
              FROM medoc m";
$resultMedocs = $database->query($sqlMedocs);
$medocs = $resultMedocs->fetch_all(MYSQLI_ASSOC);

// Fetch patients
$sqlPatients = "SELECT p.pid, p.pemail, p.pname, p.ppassword, p.paddress, p.pnic, p.pdob, p.ptel, p.profile, p.statut 
                FROM patient p";
$resultPatients = $database->query($sqlPatients);
$patients = $resultPatients->fetch_all(MYSQLI_ASSOC);

// Fetch schedules
$sqlSchedules = "SELECT s.scheduleid, s.docid, d.docname AS doctor_name, s.title, s.scheduledate, s.scheduletime, s.nop 
                 FROM schedule s
                 JOIN doctor d ON s.docid = d.docid";
$resultSchedules = $database->query($sqlSchedules);
$schedules = $resultSchedules->fetch_all(MYSQLI_ASSOC);

// Fetch specialties
$sqlSpecialties = "SELECT s.id, s.sname FROM specialties s";
$resultSpecialties = $database->query($sqlSpecialties);
$specialties = $resultSpecialties->fetch_all(MYSQLI_ASSOC);

// Fetch treatments
$sqlTreatments = "SELECT t.tid, t.pid, p.pname AS patient_name, t.docid, d.docname AS doctor_name, t.nom, t.description, t.dosage, 
                   t.frequence, t.date_dbt, t.date_fin, t.etat, t.effet_sec, t.date_trait 
                   FROM traitement t
                   JOIN patient p ON t.pid = p.pid
                   JOIN doctor d ON t.docid = d.docid";
$resultTreatments = $database->query($sqlTreatments);
$treatments = $resultTreatments->fetch_all(MYSQLI_ASSOC);

echo json_encode([
    'appointments' => $appointments,
    'approvisionnement' => $approvisionnement,
    'doctors' => $doctors,
    'medocs' => $medocs,
    'patients' => $patients,
    'schedules' => $schedules,
    'specialties' => $specialties,
    'treatments' => $treatments,
]);

$database->close();
?>
