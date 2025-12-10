<?php

declare(strict_types=1);

namespace Telnyx\DetailRecords\DetailRecordListResponse\VerifyDetailRecord;

/**
 * Depending on the type of verification, the `verify_channel_id`
 * points to one of the following channel ids;
 * ---
 * verify_channel_type | verify_channel_id
 * ------------------- | -----------------
 * sms, psd2           | messaging_id
 * call, flashcall     | call_control_id
 * ---.
 */
enum VerifyChannelType: string
{
    case SMS = 'sms';

    case PSD2 = 'psd2';

    case CALL = 'call';

    case FLASHCALL = 'flashcall';
}
