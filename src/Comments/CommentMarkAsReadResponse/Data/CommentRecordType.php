<?php

declare(strict_types=1);

namespace Telnyx\Comments\CommentMarkAsReadResponse\Data;

enum CommentRecordType: string
{
    case SUB_NUMBER_ORDER = 'sub_number_order';

    case REQUIREMENT_GROUP = 'requirement_group';
}
