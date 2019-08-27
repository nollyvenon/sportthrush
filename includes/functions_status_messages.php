<?php

/*
 * Table: user_deposit
 * Column: status
 */
function status_user_deposit($status) {
    switch ($status) {
        case '1': $message = "Deposit Initiated"; break;
        case '2': $message = "Notified"; break;
        case '3': $message = "Confirmation In Progress"; break;
        case '4': $message = "Confirmation Declined"; break;
        case '5': $message = "Confirmed"; break;
        case '6': $message = "Funding In Progress"; break;
        case '7': $message = "Funding Declined"; break;
        case '8': $message = "Completed"; break;
        case '9': $message = "Payment Failed"; break;
        case '10': $message = "Expired"; break;
        default: $message = "Status Unknown"; break;
    }
    return $message;
}

function user_status($status){
switch ($status) {
        case '0': $message = "Inactive"; break;
        case '1': $message = "Active"; break;
        default: $message = "Status Unknown"; break;
    }
    return $message;
}

/*
 * Table: user_withdrawal
 * Column: status
 */
function status_user_withdrawal($status) {
    switch ($status) {
        case '1': $message = "Withdrawal Initiated"; break;
        case '2': $message = "Account Check In Progress"; break;
        case '3': $message = "Account Check Failed"; break;
        case '4': $message = "Account Check Successful"; break;
        case '5': $message = "Withdrawal In Progress"; break;
        case '6': $message = "Withdrawal Declined"; break;
        case '7': $message = "Withdrawal Successful"; break;
        case '8': $message = "Payment In Progress"; break;
        case '9': $message = "Payment Declined"; break;
        case '10': $message = "Payment Made / Completed"; break;
        default: $message = "Status Unknown"; break;
    }
    return $message;
}

/*
 * Table: user_deposit
 * Column: client_pay_method
 */
function status_user_deposit_pay_method($status) {
    switch ($status) {
        case '1': $message = "WebPay"; break;
        case '2': $message = "Internet Transfer"; break;
        case '3': $message = "ATM Transfer"; break;
        case '4': $message = "Bank Transfer"; break;
        case '5': $message = "Mobile Money Transfer"; break;
        case '6': $message = "Cash Deposit"; break;
        case '7': $message = "Office Funding"; break;
        case '8': $message = "Not Listed"; break;
        default: $message = "Payment Method Unknown"; break;
    }
    return $message;
}

/*
 * Table: admin
 * Column: status
 */
function status_admin($status) {
    switch ($status) {
        case '1': $message = "Active"; break;
        case '2': $message = "Inactive"; break;
        case '3': $message = "Suspended"; break;
        default: $message = "Status Unknown"; break;
    }
    return $message;
}

/*
 * Table: campaign_category
 * Column: status
 */
function status_campaign_category($status) {
    switch ($status) {
        case '1': $message = "Active"; break;
        case '2': $message = "Inactive"; break;
        default: $message = "Status Unknown"; break;
    }
    return $message;
}

/*
 * Table: Article
 * Column: status
 */
function status_article($status) {
    switch ($status) {
        case '1': $message = "Published"; break;
        case '2': $message = "Draft"; break;
        case '3': $message = "Inactive"; break;
        default: $message = "Status Unknown"; break;
    }
    return $message;
}

/*
 * Table: Admin Bulletin
 * Column: status
 */
function status_admin_bulletin($status) {
    switch ($status) {
        case '1': $message = "Published"; break;
        case '2': $message = "Draft"; break;
        case '3': $message = "Inactive"; break;
        default: $message = "Status Unknown"; break;
    }
    return $message;
}

/*
 * Table: Snappy Help
 * Column: status
 */
function status_snappy_help($status) {
    switch ($status) {
        case '1': $message = "Active"; break;
        case '2': $message = "Inactive"; break;
        case '3': $message = "Draft"; break;
        default: $message = "Status Unknown"; break;
    }
    return $message;
}

/*
 * Table: Campaign Email
 * Column: status
 */
function status_campaign_email($status) {
    switch ($status) {
        case '1': $message = "Draft"; break;
        case '2': $message = "Published"; break;
        case '3': $message = "Approved"; break;
        case '4': $message = "Disapproved"; break;
        case '5': $message = "In Progress"; break;
        case '6': $message = "Completed"; break;
        default: $message = "Status Unknown"; break;
    }
    return $message;
}

/*
 * Table: Campaign Email
 * Column: status
 */
function status_solo_campaign_email($status) {
    switch ($status) {
        case '1': $message = "Draft"; break;
        case '2': $message = "Published"; break;
        case '3': $message = "Inactive"; break;
        default: $message = "Status Unknown"; break;
    }
    return $message;
}

/*
 * Table: User Account Flag
 * Column: status
 */
function status_account_flag($status) {
    switch ($status) {
        case '1': $message = "Active"; break;
        case '2': $message = "Inactive"; break;
        default: $message = "Status Unknown"; break;
    }
    return $message;
}

/*
 * Table: User Verification
 * Column: phone_status
 */
function status_user_verification($status) {
    switch ($status) {
        case '1': $message = "New"; break;
        case '2': $message = "Verified"; break;
        default: $message = "Status Unknown"; break;
    }
    return $message;
}

/*
 * Table: 
 * Column: 
 */
function client_group_campaign_category($status) {
    switch ($status) {
        case '1': $message = "All Clients"; break;
        default: $message = "Unknown"; break;
    }
    return $message;
}

/*
 * Table: Campaign Category
 * Column: client_group
 */
function client_group_query($client_group) {
    switch ($client_group) {
        case '1': $query = "SELECT first_name, email FROM user WHERE campaign_subscribe = '1'"; break;
        default: $query = false; break;
    }
    return $query;
}

function status_fc_type($status) {
    switch ($status) {
        case '1': $message = "Credit / User Deposit"; break;
        case '2': $message = "Credit / User Withdrawal"; break;
        case '3': $message = "Debit";
        default: $message = "Status Unknown"; break;
    }
    return $message;
}

function status_trans_type($status) {
    switch ($status) {
        case '1': $message = "Credit"; break;
        case '2': $message = "Debit"; break;
        default: $message = "Status Unknown"; break;
    }
    return $message;
}

function publish_status($status) {
    switch ($status) {
        case '1': $message = "Draft"; break;
        case '2': $message = "Publish"; break;
        case '3': $message = "Inactive"; break;
        default: $message = "Status Unknown"; break;
    }
    return $message;
}

/*
 * Table: User Credential
 * Column: status
 */
function user_credential_status($status) {
    switch ($status) {
        case '1': $message = "Awaiting Moderation"; break;
        case '2': $message = "Approved"; break;
        case '3': $message = "Not Approved"; break;
        default: $message = "Status Unknown"; break;
    }
    return $message;
}

/*
 * Table: Free Training Campaign
 * Column: training_interest
 */
function free_training_campaign_interest($status) {
    switch ($status) {
        case '1': $message = "Not Yet"; break;
        case '2': $message = "Yes"; break;
        default: $message = "Status Unknown"; break;
    }
    return $message;
}

/*
 * Table: Free Training Campaign
 * Column: training_centre
 */
function free_training_campaign_centre($status) {
    switch ($status) {
        case '1': $message = "Diamond Estate"; break;
        case '2': $message = "Ikota Office"; break;
        default: $message = "Status Unknown"; break;
    }
    return $message;
}

function partner_withdrawal_trans_type($status) {
    switch ($status) {
        case '1': $message = "IFX Payment"; break;
        case '2': $message = "Bank Payment"; break;
        default: $message = "Status Unknown"; break;
    }
    return $message;
}

function partner_withdrawal_status($status) {
    switch ($status) {
        case '1': $message = "New"; break;
        case '2': $message = "Approved"; break;
        case '3': $message = "Disapproved"; break;
        default: $message = "Status Unknown"; break;
    }
    return $message;
}