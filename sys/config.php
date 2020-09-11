<?php

$staffRanks = [
    'Core Administration',
    'Senior Administration',
    'Administration',
    'Junior Administration',
    'Senior Staff',
    'Staff',
];

$adminRanks = [
    'Core Administration',
    'Senior Administration',
    'Administration',
    'Junior Administration',
];

$communityRanks = [
    'Core Administration',
    'Senior Administration',
    'Administration',
    'Junior Administration',
    'Senior Staff',
    'Staff',
    'Junior Staff',
    'Member',
    'Applicant',
];

$recruitmentCommand = [
    'Department Director',
    'Department Supervisor',
    'Department Lead',
];

$recruitmentRanks = [
    'Department Director',
    'Department Supervisor',
    'Department Lead',
    'Department Evaluator',
    'Department Liasion',
    'Department Officer',
    'Department Assistant',
    'Department Retired',
];

$developmentRanks = [
    'Development Coordinator',
    'Development Manager',
    'Development Supervisor',
    'Development Team Lead',
    'Senior Developer',
    'Developer',
    'Development Affiliate',
];

$lspdRanks = [
    'Chief of Police', // DEPARTMENT HEAD
    'Assistant Chief of Police', // DEPARTMENT ADMIN
    'Deputy Chief of Police', // DEPARTMENT ADMIN
    'Police Captain', // DEPARTMENT SENIOR STAFF
    'Police Lieutenant', // DEPARTMENT SENIOR STAFF
    'Police Master Sergeant', // DEPARTMENT STAFF
    'Police Sergeant', // DEPARTMENT STAFF
    'Police Senior Corporal', // DEPARTMENT JUNIOR STAFF
    'Police Corporal', // DEPARTMENT JUNIOR STAFF
    'Senior Police Officer II', // DEPARTMENT MEMBER
    'Senior Police Officer I', // DEPARTMENT MEMBER
    'Police Officer II', // DEPARTMENT MEMBER
    'Police Officer I', // DEPARTMENT MEMBER
    'Probationary Police Officer', // DEPARTMENT PROBATIONARY MEMBER
];

$bcsoRanks = [
    'Sheriff', // DEPARTMENT HEAD
    'Undersheriff', // DEPARTMENT ADMIN
    'Sheriff Colonel', // DEPARTMENT ADMIN
    'Captain', // DEPARTMENT SENIOR STAFF
    'Lieutenant', // DEPARTMENT SENIOR STAFF
    'Master Sergeant', // DEPARTMENT STAFF
    'Sergeant', // DEPARTMENT STAFF
    'Senior Corporal', // DEPARTMENT JUNIOR STAFF
    'Corporal', // DEPARTMENT JUNIOR STAFF
    'Senior Deputy II', // DEPARTMENT MEMBER
    'Senior Deputy I', // DEPARTMENT MEMBER
    'Deputy II', // DEPARTMENT MEMBER
    'Deputy I', // DEPARTMENT MEMBER
    'Probationary Deputy', // DEPARTMENT PROBATIONARY MEMBER
];

$saspRanks = [
    'Commissioner', // DEPARTMENT HEAD
    'Deputy Commissioner', // DEPARTMENT ADMIN
    'Assistant Commissioner', // DEPARTMENT ADMIN
    'Captain', // DEPARTMENT SENIOR STAFF
    'Lieutenant', // DEPARTMENT SENIOR STAFF
    'Master Sergeant', // DEPARTMENT STAFF
    'Sergeant', // DEPARTMENT STAFF
    'Senior Corporal', // DEPARTMENT JUNIOR STAFF
    'Corporal', // DEPARTMENT JUNIOR STAFF
    'Senior Trooper II', // DEPARTMENT MEMBER
    'Senior Trooper I', // DEPARTMENT MEMBER
    'Trooper II', // DEPARTMENT MEMBER
    'Trooper I', // DEPARTMENT MEMBER
    'Probationary Trooper', // DEPARTMENT PROBATIONARY MEMBER
];

$fireRanks = [
    'Fire Chief', // DEPARTMENT HEAD
    'Deputy Fire Chief', // DEPARTMENT ADMIN
    'Assistant Fire Chief', // DEPARTMENT ADMIN
    'Fire Captain', // DEPARTMENT SENIOR STAFF
    'Fire Lieutenant', // DEPARTMENT SENIOR STAFF
    'Station Commander', // DEPARTMENT STAFF
    'Station Supervisor', // DEPARTMENT STAFF
    'Station Engineer', // DEPARTMENT JUNIOR STAFF
    'Station Advisor', // DEPARTMENT JUNIOR STAFF
    'Senior Firefighter II', // DEPARTMENT MEMBER
    'Senior Firefighter I', // DEPARTMENT MEMBER
    'Firefighter II', // DEPARTMENT MEMBER
    'Firefighter I', // DEPARTMENT MEMBER
    'Probationary Firefighter', // DEPARTMENT PROBATIONARY MEMBER
];

$commsRanks = [
    'Dispatch Director', // DEPARTMENT HEAD
    'Dispatch Deputy Director', // DEPARTMENT ADMIN
    'Dispatch Operations Commander', // DEPARTMENT ADMIN
    'Dispatch Manager', // DEPARTMENT SENIOR STAFF
    'Dispatch Supervisor', // DEPARTMENT SENIOR STAFF
    'Senior Operator IV', // DEPARTMENT STAFF
    'Senior Operator III', // DEPARTMENT STAFF
    'Senior Operator II', // DEPARTMENT JUNIOR STAFF
    'Senior Operator I', // DEPARTMENT JUNIOR STAFF
    'Operator IV', // DEPARTMENT MEMBER
    'Operator III', // DEPARTMENT MEMBER
    'Operator II', // DEPARTMENT MEMBER
    'Operator I', // DEPARTMENT MEMBER
    'Dispatch Cadet', // DEPARTMENT PROBATIONARY MEMBER
];

$civRanks = [
    'Civilian Director', // DEPARTMENT HEAD
    'Civilian Deputy Director', // DEPARTMENT ADMIN
    'Civilian Chief of Staff', // DEPARTMENT ADMIN
    'Civilian Chairman', // DEPARTMENT SENIOR STAFF
    'Civilian Vice Chairman', // DEPARTMENT SENIOR STAFF
    'Civilian Senior Manager', // DEPARTMENT STAFF
    'Civilian Assistant Manager', // DEPARTMENT STAFF
    'Civilian Senior Lead', // DEPARTMENT JUNIOR STAFF
    'Civilian Lead', // DEPARTMENT JUNIOR STAFF
    'Civilian IV', // DEPARTMENT MEMBER
    'Civilian III', // DEPARTMENT MEMBER
    'Civilian II', // DEPARTMENT MEMBER
    'Civilian I', // DEPARTMENT MEMBER
    'Probationary Civilian', // DEPARTMENT PROBATIONARY MEMBER
];

$allCommunityDepartmentRanks = [
    // Los Santos Police Department
    'Chief of Police',
    'Assistant Chief of Police',
    'Deputy Chief of Police',
    'Police Captain',
    'Police Lieutenant',
    'Police Master Sergeant',
    'Police Sergeant',
    'Police Senior Corporal',
    'Police Corporal',
    'Senior Police Officer II',
    'Senior Police Officer I',
    'Police Officer I',
    'Police Officer I',
    'Police Officer I',
    'Probationary Police Officer', 
    // Blaine County Sheriff's Office
    'Sheriff',
    'Undersheriff',
    'Sheriff Colonel',
    'Captain',
    'Lieutenant',
    'Master Sergeant',
    'Sergeant',
    'Senior Corporal',
    'Corporal',
    'Senior Deputy II',
    'Senior Deputy I',
    'Deputy III',
    'Deputy II',
    'Deputy I',
    'Probationary Deputy',
    // San Andreas State Police
    'Commissioner',
    'Deputy Commissioner',
    'Assistant Commissioner',
    'Captain',
    'Lieutenant',
    'Master Sergeant',
    'Sergeant',
    'Senior Corporal',
    'Corporal',
    'Trooper',
    'Trooper',
    'Trooper',
    'Trooper',
    'Trooper I',
    'Probationary Trooper',
    // San Andreas Fire Department
    'Fire Chief',
    'Deputy Fire Chief',
    'Assistant Fire Chief',
    'Fire Captain',
    'Fire Lieutenant',
    'Station Commander',
    'Station Supervisor',
    'Station Engineer',
    'Station Advisor',
    'Senior Firefighter II',
    'Senior Firefighter I',
    'Firefighter II',
    'Firefighter I',
    'Probationary Firefighter',
    // Civilian Operations Department
    'Civilian Director',
    'Civilian Deputy Director',
    'Civilian Chief of Staff',
    'Civilian Chairman',
    'Civilian Vice Chairman',
    'Civilian Senior Manager',
    'Civilian Assistant Manager',
    'Civilian Senior Lead',
    'Civilian Lead',
    'Civilian IV',
    'Civilian III',
    'Civilian II',
    'Civilian I',
    'Probationary Civilian',
    // Communications Department
    'Dispatch Director',
    'Dispatch Deputy Director',
    'Dispatch Operations Commander',
    'Dispatch Manager',
    'Dispatch Supervisor',
    'Senior Operator IV',
    'Senior Operator III',
    'Senior Operator II',
    'Senior Operator I',
    'Operator IV',
    'Operator III',
    'Operator II',
    'Operator I',
    'Dispatch Cadet',
    // Development Department
    'Development Coordinator',
    'Development Manager',
    'Development Supervisor',
    'Development Team Lead',
    'Senior Developer',
    'Developer',
    'Development Affiliate',
    // Administrative Ranks
    'Director',
    'Deputy Director',
    'Community Coordinator'
]








?>