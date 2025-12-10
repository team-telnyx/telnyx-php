<?php

declare(strict_types=1);

namespace Telnyx\Rooms\Sessions\Actions\ActionMuteParams;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Core\Conversion\ListOf;
use Telnyx\Rooms\Sessions\Actions\ActionMuteParams\Participants\AllParticipants;

/**
 * Either a list of participant id to perform the action on, or the keyword "all" to perform the action on all participant.
 */
final class Participants implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [AllParticipants::class, new ListOf('string')];
    }
}
