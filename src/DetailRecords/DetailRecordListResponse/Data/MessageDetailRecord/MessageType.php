<?php

declare(strict_types=1);

namespace Telnyx\DetailRecords\DetailRecordListResponse\Data\MessageDetailRecord;

/**
 * Describes the Messaging service used to send the message. Available services are: Short Message Service (SMS), Multimedia Messaging Service (MMS), and Rich Communication Services (RCS).
 */
enum MessageType: string
{
    case SMS = 'SMS';

    case MMS = 'MMS';

    case RCS = 'RCS';
}
