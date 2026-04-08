<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones\VoiceCloneCreateParams;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\VoiceClones\VoiceCloneCreateParams\Params\MinimaxDesignClone;
use Telnyx\VoiceClones\VoiceCloneCreateParams\Params\TelnyxDesignClone;

/**
 * Request body for creating a voice clone from an existing voice design.
 *
 * @phpstan-import-type TelnyxDesignCloneShape from \Telnyx\VoiceClones\VoiceCloneCreateParams\Params\TelnyxDesignClone
 * @phpstan-import-type MinimaxDesignCloneShape from \Telnyx\VoiceClones\VoiceCloneCreateParams\Params\MinimaxDesignClone
 *
 * @phpstan-type ParamsVariants = TelnyxDesignClone|MinimaxDesignClone
 * @phpstan-type ParamsShape = ParamsVariants|TelnyxDesignCloneShape|MinimaxDesignCloneShape
 */
final class Params implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [TelnyxDesignClone::class, MinimaxDesignClone::class];
    }
}
