<?php
/**
 * Canonical programme catalogue. Every programme page and every listing
 * on the site (homepage, academics, admissions) reads from this single
 * array, so a programme's facts only need to be correct in one place.
 *
 * NOTE ON CONTENT: durations and qualification levels reflect the
 * categories already used across the project (application form,
 * fee schedule). Curriculum/module lists are indicative course
 * structures for this type of programme, written as a sensible
 * starting point — replace with the confirmed WMU syllabus per
 * programme when the faculty provides it.
 */

$GLOBALS['PROGRAMMES'] = [

    'nursing' => [
        'slug' => 'nursing',
        'name' => 'Bachelor of Nursing Science',
        'level' => 'Undergraduate',
        'qualification' => 'Bachelor\'s Degree',
        'duration' => '4 years, full-time',
        'image' => 'students.jpg',
        'summary' => 'Professional nursing practice across hospital, clinic and community settings.',
        'overview' => 'This programme prepares graduates for professional nursing practice in hospitals, clinics and community settings. It combines classroom theory, simulated clinical practice and structured hospital placements, building toward safe, independent registered-nurse practice.',
        'entry_requirements' => [
            'Grade 12 / NSSCO with a minimum of 25 points',
            'A pass in Biology and English (C grade or equivalent)',
            'Medical fitness certificate for clinical placement',
            'Police clearance certificate',
        ],
        'curriculum' => [
            'Year 1' => ['Anatomy & Physiology I', 'Foundations of Nursing Practice', 'Basic Pharmacology', 'Community Health I'],
            'Year 2' => ['Medical-Surgical Nursing I', 'Pathophysiology', 'Midwifery I', 'Clinical Skills & Simulation'],
            'Year 3' => ['Mental Health Nursing', 'Paediatric Nursing', 'Community Health II', 'Research Methods'],
            'Year 4' => ['Advanced Nursing Practice', 'Nursing Leadership & Management', 'Extended Clinical Internship', 'Capstone Project'],
        ],
        'careers' => ['Registered Nurse', 'Clinical Nurse Specialist', 'Community Health Nurse', 'Nurse Manager'],
    ],

    'pharmacy' => [
        'slug' => 'pharmacy',
        'name' => 'Bachelor of Pharmacy',
        'level' => 'Undergraduate',
        'qualification' => 'Bachelor\'s Degree',
        'duration' => '4 years, full-time',
        'image' => 'labs.jpg',
        'summary' => 'Pharmaceutical science, dispensing practice and patient-focused pharmaceutical care.',
        'overview' => 'The Bachelor of Pharmacy trains students in pharmaceutical chemistry, pharmacology and dispensing practice, combined with supervised placements in community and hospital pharmacies. Graduates are equipped to manage medicines safely and support patient care.',
        'entry_requirements' => [
            'Grade 12 / NSSCO with a minimum of 25 points',
            'A pass in Chemistry, Biology and Mathematics',
            'A pass in English (C grade or equivalent)',
        ],
        'curriculum' => [
            'Year 1' => ['General & Organic Chemistry', 'Human Anatomy & Physiology', 'Introduction to Pharmacy Practice', 'Mathematics for Pharmacy'],
            'Year 2' => ['Pharmaceutical Chemistry', 'Pharmacology I', 'Pharmaceutics I', 'Microbiology'],
            'Year 3' => ['Pharmacology II', 'Pharmaceutics II', 'Clinical Pharmacy', 'Pharmacy Law & Ethics'],
            'Year 4' => ['Hospital Pharmacy Practice', 'Community Pharmacy Placement', 'Pharmacotherapeutics', 'Research Project'],
        ],
        'careers' => ['Registered Pharmacist', 'Hospital Pharmacist', 'Community Pharmacy Manager', 'Pharmaceutical Regulatory Officer'],
    ],

    'medicine' => [
        'slug' => 'medicine',
        'name' => 'Bachelor of Medicine & Surgery (MBChB)',
        'level' => 'Undergraduate',
        'qualification' => 'Bachelor\'s Degree (MBChB)',
        'duration' => '6 years, full-time',
        'image' => 'laboratory.jpg',
        'summary' => 'A six-year medical degree combining pre-clinical science with extensive clinical rotations.',
        'overview' => 'The MBChB is a six-year programme building from foundational biomedical science through to supervised clinical rotations across major hospital departments. The curriculum emphasises clinical reasoning, patient communication and evidence-based practice suited to the regional burden of disease.',
        'entry_requirements' => [
            'Grade 12 / NSSCO with a minimum of 32 points',
            'A pass in Biology, Chemistry, Physics and Mathematics',
            'A pass in English (B grade or equivalent)',
            'Competitive selection interview',
        ],
        'curriculum' => [
            'Years 1–2 (Pre-clinical)' => ['Human Anatomy', 'Physiology', 'Biochemistry', 'Introduction to Clinical Skills'],
            'Years 3–4 (Para-clinical)' => ['Pathology', 'Pharmacology', 'Microbiology', 'Community & Public Health'],
            'Years 5–6 (Clinical Rotations)' => ['Internal Medicine', 'Surgery', 'Obstetrics & Gynaecology', 'Paediatrics', 'Psychiatry', 'Elective Rotation'],
        ],
        'careers' => ['Medical Doctor (post-internship)', 'General Practitioner', 'Hospital Clinician', 'Pathway to Specialist Training'],
    ],

    'biomedical' => [
        'slug' => 'biomedical',
        'name' => 'Bachelor of Biomedical Sciences',
        'level' => 'Undergraduate',
        'qualification' => 'Bachelor\'s Degree',
        'duration' => '4 years, full-time',
        'image' => 'laboratory.jpg',
        'summary' => 'Laboratory science underpinning diagnostics, research and public health.',
        'overview' => 'This programme develops laboratory and diagnostic science skills across haematology, microbiology, clinical chemistry and histopathology, preparing graduates for careers in medical laboratories, research and public health surveillance.',
        'entry_requirements' => [
            'Grade 12 / NSSCO with a minimum of 27 points',
            'A pass in Biology and Chemistry',
            'A pass in Mathematics and English',
        ],
        'curriculum' => [
            'Year 1' => ['Cell Biology', 'General Chemistry', 'Human Anatomy & Physiology I', 'Introduction to Laboratory Techniques'],
            'Year 2' => ['Microbiology', 'Biochemistry', 'Haematology I', 'Clinical Chemistry I'],
            'Year 3' => ['Immunology', 'Histopathology', 'Molecular Biology', 'Laboratory Quality Management'],
            'Year 4' => ['Clinical Laboratory Placement', 'Research Project', 'Advanced Diagnostics', 'Public Health Surveillance'],
        ],
        'careers' => ['Medical Laboratory Scientist', 'Research Technologist', 'Quality Control Officer', 'Public Health Laboratory Officer'],
    ],

    'environmental-health' => [
        'slug' => 'environmental-health',
        'name' => 'Bachelor of Environmental Health',
        'level' => 'Undergraduate',
        'qualification' => 'Bachelor\'s Degree',
        'duration' => '4 years, full-time',
        'image' => 'accommodation.jpg',
        'summary' => 'Public and environmental health practice, from sanitation to disease prevention.',
        'overview' => 'The programme prepares environmental health practitioners to assess and manage risks in water quality, food safety, sanitation and occupational health, working at the intersection of public health policy and community practice.',
        'entry_requirements' => [
            'Grade 12 / NSSCO with a minimum of 25 points',
            'A pass in Biology and Geography or a physical science',
            'A pass in English and Mathematics',
        ],
        'curriculum' => [
            'Year 1' => ['Introduction to Environmental Health', 'Human Biology', 'Chemistry for Environmental Health', 'Sociology of Health'],
            'Year 2' => ['Food Safety & Hygiene', 'Water Quality Management', 'Epidemiology I', 'Occupational Health & Safety'],
            'Year 3' => ['Waste Management', 'Disease Vector Control', 'Environmental Health Law', 'Epidemiology II'],
            'Year 4' => ['Fieldwork Placement', 'Environmental Impact Assessment', 'Research Project', 'Health Promotion Strategy'],
        ],
        'careers' => ['Environmental Health Officer', 'Public Health Inspector', 'Occupational Health & Safety Officer', 'Municipal Health Practitioner'],
    ],

    'master-public-health' => [
        'slug' => 'master-public-health',
        'name' => 'Master of Public Health',
        'level' => 'Postgraduate',
        'qualification' => 'Master\'s Degree',
        'duration' => '2 years, full-time',
        'image' => 'library.jpg',
        'summary' => 'Advanced training in epidemiology, health systems and population health research.',
        'overview' => 'A research-oriented postgraduate programme for health professionals seeking to lead in epidemiology, health systems strengthening and population-level intervention design. Includes a supervised dissertation addressing a regional public health question.',
        'entry_requirements' => [
            'A recognised Bachelor\'s degree in a health, science or social science field',
            'Relevant professional experience is an advantage',
            'Research proposal submitted with application',
        ],
        'curriculum' => [
            'Year 1' => ['Advanced Epidemiology', 'Biostatistics', 'Health Systems & Policy', 'Research Methods'],
            'Year 2' => ['Health Economics', 'Monitoring & Evaluation', 'Dissertation Research', 'Elective: Communicable or Non-Communicable Disease Control'],
        ],
        'careers' => ['Public Health Manager', 'Epidemiologist', 'Health Policy Analyst', 'NGO / Programme Manager'],
    ],

    'master-nursing' => [
        'slug' => 'master-nursing',
        'name' => 'Master of Nursing Science',
        'level' => 'Postgraduate',
        'qualification' => 'Master\'s Degree',
        'duration' => '2 years, full-time',
        'image' => 'students.jpg',
        'summary' => 'Advanced clinical and leadership training for registered nurses.',
        'overview' => 'Designed for registered nurses seeking advanced clinical specialisation or nursing leadership roles, this programme combines advanced practice modules with a supervised research dissertation.',
        'entry_requirements' => [
            'A Bachelor of Nursing Science or equivalent recognised qualification',
            'Current nursing registration in good standing',
            'Minimum two years of post-registration clinical experience',
        ],
        'curriculum' => [
            'Year 1' => ['Advanced Health Assessment', 'Nursing Theory & Evidence-Based Practice', 'Healthcare Leadership', 'Research Methods'],
            'Year 2' => ['Specialist Clinical Practicum', 'Health Policy & Ethics', 'Dissertation Research', 'Elective Specialisation'],
        ],
        'careers' => ['Nurse Practitioner', 'Clinical Nurse Educator', 'Nursing Services Manager', 'Academic / Research Nurse'],
    ],

    'diploma-nursing' => [
        'slug' => 'diploma-nursing',
        'name' => 'Diploma in Nursing & Midwifery',
        'level' => 'Diploma',
        'qualification' => 'National Diploma',
        'duration' => '3 years, full-time',
        'image' => 'students.jpg',
        'summary' => 'Practical, clinically focused training in general and midwifery nursing.',
        'overview' => 'A practice-led diploma combining core nursing theory with extensive supervised clinical and midwifery placement hours, preparing graduates for registration and frontline practice.',
        'entry_requirements' => [
            'Grade 12 / NSSCO with a minimum of 22 points',
            'A pass in Biology and English',
            'Medical fitness certificate for clinical placement',
        ],
        'curriculum' => [
            'Year 1' => ['Foundations of Nursing', 'Anatomy & Physiology', 'Basic Pharmacology', 'Communication in Healthcare'],
            'Year 2' => ['Medical-Surgical Nursing', 'Midwifery Practice I', 'Community Health Nursing', 'Clinical Placement I'],
            'Year 3' => ['Midwifery Practice II', 'Mental Health Nursing', 'Clinical Placement II', 'Professional Practice & Ethics'],
        ],
        'careers' => ['Enrolled Nurse', 'Midwife', 'Community Health Practitioner'],
    ],

    'diploma-pharmacy-assistant' => [
        'slug' => 'diploma-pharmacy-assistant',
        'name' => 'Diploma in Pharmacy Assistant',
        'level' => 'Diploma',
        'qualification' => 'National Diploma',
        'duration' => '3 years, full-time',
        'image' => 'labs.jpg',
        'summary' => 'Dispensary operations and supervised pharmaceutical support practice.',
        'overview' => 'This diploma trains pharmacy assistants to support licensed pharmacists in dispensary operations, stock management and patient-facing service, with supervised placement in community and hospital pharmacies.',
        'entry_requirements' => [
            'Grade 12 / NSSCO with a minimum of 20 points',
            'A pass in Mathematics and a science subject',
            'A pass in English',
        ],
        'curriculum' => [
            'Year 1' => ['Introduction to Pharmacy Practice', 'Basic Pharmacology', 'Anatomy & Physiology', 'Pharmacy Calculations'],
            'Year 2' => ['Dispensary Operations', 'Pharmaceutical Stock Management', 'Patient Care & Communication', 'Clinical Placement I'],
            'Year 3' => ['Pharmacy Law & Ethics', 'Community Pharmacy Practice', 'Clinical Placement II', 'Workplace Readiness'],
        ],
        'careers' => ['Pharmacy Assistant', 'Dispensary Technician', 'Pharmaceutical Stock Controller'],
    ],

    'diploma-environmental-health' => [
        'slug' => 'diploma-environmental-health',
        'name' => 'Diploma in Environmental Health',
        'level' => 'Diploma',
        'qualification' => 'National Diploma',
        'duration' => '3 years, full-time',
        'image' => 'accommodation.jpg',
        'summary' => 'Applied training in sanitation, food safety and community environmental health.',
        'overview' => 'A practical diploma preparing graduates to carry out environmental health inspections, food safety monitoring and community sanitation programmes under professional supervision.',
        'entry_requirements' => [
            'Grade 12 / NSSCO with a minimum of 20 points',
            'A pass in Biology or a physical science',
            'A pass in English',
        ],
        'curriculum' => [
            'Year 1' => ['Introduction to Environmental Health', 'Basic Microbiology', 'Human Biology', 'Community Health Principles'],
            'Year 2' => ['Food Safety Inspection', 'Water & Sanitation', 'Occupational Health Basics', 'Fieldwork Placement I'],
            'Year 3' => ['Waste & Vector Control', 'Environmental Health Regulation', 'Fieldwork Placement II', 'Workplace Readiness'],
        ],
        'careers' => ['Environmental Health Assistant', 'Food Safety Inspector', 'Municipal Sanitation Officer'],
    ],

    'certificate-community-health' => [
        'slug' => 'certificate-community-health',
        'name' => 'Certificate in Community Health',
        'level' => 'Certificate',
        'qualification' => 'National Certificate',
        'duration' => '1 year, full-time',
        'image' => 'accommodation.jpg',
        'summary' => 'Entry-level training for community-based health outreach work.',
        'overview' => 'A foundational certificate for learners entering community health work, covering health promotion, basic first aid and household-level health education for underserved communities.',
        'entry_requirements' => [
            'Grade 10 or Grade 12 / NSSCO',
            'A pass in English',
        ],
        'curriculum' => [
            'Modules' => ['Introduction to Community Health', 'Basic First Aid', 'Health Promotion & Education', 'Maternal & Child Health Basics', 'Community Fieldwork Placement'],
        ],
        'careers' => ['Community Health Worker', 'Health Outreach Assistant', 'Home-Based Care Assistant'],
    ],

    'certificate-emergency-health' => [
        'slug' => 'certificate-emergency-health',
        'name' => 'Certificate in Emergency Medical Care',
        'level' => 'Certificate',
        'qualification' => 'National Certificate',
        'duration' => '1 year, full-time',
        'image' => 'laboratory.jpg',
        'summary' => 'First-response and basic emergency care skills.',
        'overview' => 'This certificate builds foundational emergency care competencies — basic life support, trauma response and patient stabilisation — for learners entering first-responder or emergency support roles.',
        'entry_requirements' => [
            'Grade 12 / NSSCO',
            'A pass in Biology and English',
            'Medical fitness certificate',
        ],
        'curriculum' => [
            'Modules' => ['Basic Life Support', 'Trauma & Injury Response', 'Patient Assessment & Stabilisation', 'Ambulance & Pre-Hospital Procedures', 'Supervised Practical Placement'],
        ],
        'careers' => ['Emergency Care Assistant', 'Ambulance Support Officer', 'First Responder'],
    ],

    'certificate-health-promotion' => [
        'slug' => 'certificate-health-promotion',
        'name' => 'Certificate in Health Promotion',
        'level' => 'Certificate',
        'qualification' => 'National Certificate',
        'duration' => '1 year, full-time',
        'image' => 'library.jpg',
        'summary' => 'Designing and delivering community health education campaigns.',
        'overview' => 'A practice-focused certificate for learners who want to design and deliver health education and behaviour-change campaigns within schools, clinics and community organisations.',
        'entry_requirements' => [
            'Grade 10 or Grade 12 / NSSCO',
            'A pass in English',
        ],
        'curriculum' => [
            'Modules' => ['Principles of Health Promotion', 'Communication & Campaign Design', 'Behaviour Change Basics', 'Working with Schools & Communities', 'Supervised Practical Placement'],
        ],
        'careers' => ['Health Promotion Officer', 'Wellness Programme Assistant', 'School Health Educator'],
    ],

];

/** Fetch one programme's data by slug, or null if unknown. */
function get_programme($slug) {
    return $GLOBALS['PROGRAMMES'][$slug] ?? null;
}

/** Fetch all programmes, optionally filtered by level. */
function get_programmes($level = null) {
    $all = $GLOBALS['PROGRAMMES'];
    if ($level === null) return $all;
    return array_filter($all, fn($p) => $p['level'] === $level);
}
