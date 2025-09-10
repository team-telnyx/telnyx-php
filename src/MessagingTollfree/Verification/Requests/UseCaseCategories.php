<?php

declare(strict_types=1);

namespace Telnyx\MessagingTollfree\Verification\Requests;

/**
 * Tollfree usecase categories.
 */
enum UseCaseCategories: string
{
    case USE_CASE_CATEGORIES_2_FA = '2FA';

    case APP_NOTIFICATIONS = 'App Notifications';

    case APPOINTMENTS = 'Appointments';

    case AUCTIONS = 'Auctions';

    case AUTO_REPAIR_SERVICES = 'Auto Repair Services';

    case BANK_TRANSFERS = 'Bank Transfers';

    case BILLING = 'Billing';

    case BOOKING_CONFIRMATIONS = 'Booking Confirmations';

    case BUSINESS_UPDATES = 'Business Updates';

    case COVID_19_ALERTS = 'COVID-19 Alerts';

    case CAREER_TRAINING = 'Career Training';

    case CHATBOT = 'Chatbot';

    case CONVERSATIONAL_ALERTS = 'Conversational / Alerts';

    case COURIER_SERVICES_DELIVERIES = 'Courier Services & Deliveries';

    case EMERGENCY_ALERTS = 'Emergency Alerts';

    case EVENTS_PLANNING = 'Events & Planning';

    case FINANCIAL_SERVICES = 'Financial Services';

    case FRAUD_ALERTS = 'Fraud Alerts';

    case FUNDRAISING = 'Fundraising';

    case GENERAL_MARKETING = 'General Marketing';

    case GENERAL_SCHOOL_UPDATES = 'General School Updates';

    case HR_STAFFING = 'HR / Staffing';

    case HEALTHCARE_ALERTS = 'Healthcare Alerts';

    case HOUSING_COMMUNITY_UPDATES = 'Housing Community Updates';

    case INSURANCE_SERVICES = 'Insurance Services';

    case JOB_DISPATCH = 'Job Dispatch';

    case LEGAL_SERVICES = 'Legal Services';

    case MIXED = 'Mixed';

    case MOTIVATIONAL_REMINDERS = 'Motivational Reminders';

    case NOTARY_NOTIFICATIONS = 'Notary Notifications';

    case ORDER_NOTIFICATIONS = 'Order Notifications';

    case POLITICAL = 'Political';

    case PUBLIC_WORKS = 'Public Works';

    case REAL_ESTATE_SERVICES = 'Real Estate Services';

    case RELIGIOUS_SERVICES = 'Religious Services';

    case REPAIR_AND_DIAGNOSTICS_ALERTS = 'Repair and Diagnostics Alerts';

    case REWARDS_PROGRAM = 'Rewards Program';

    case SURVEYS = 'Surveys';

    case SYSTEM_ALERTS = 'System Alerts';

    case VOTING_REMINDERS = 'Voting Reminders';

    case WAITLIST_ALERTS = 'Waitlist Alerts';

    case WEBINAR_REMINDERS = 'Webinar Reminders';

    case WORKSHOP_ALERTS = 'Workshop Alerts';
}
