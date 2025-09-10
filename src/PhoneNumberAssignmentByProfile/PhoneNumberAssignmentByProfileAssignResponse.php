<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumberAssignmentByProfile;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileAssignResponse\AssignProfileToCampaignResponse;
use Telnyx\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileAssignResponse\SettingsDataErrorMessage;

final class PhoneNumberAssignmentByProfileAssignResponse implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,
     * string|Converter|ConverterSource,>
     */
    public static function variants(): array
    {
        return [
            AssignProfileToCampaignResponse::class, SettingsDataErrorMessage::class,
        ];
    }
}
