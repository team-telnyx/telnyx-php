<?php

declare(strict_types=1);

namespace Telnyx\Rooms\Sessions\Actions\ActionKickParams;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Core\Conversion\ListOf;
use Telnyx\Rooms\Sessions\Actions\ActionKickParams\Participants\UnionMember0;

/**
 * Either a list of participant id to perform the action on, or the keyword "all" to perform the action on all participant.
 */
final class Participants implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,
     * string|Converter|ConverterSource,>
     */
    public static function variants(): array
    {
        return [UnionMember0::class, new ListOf('string')];
    }
}
