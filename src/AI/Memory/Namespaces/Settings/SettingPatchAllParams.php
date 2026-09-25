<?php

declare(strict_types=1);

namespace Telnyx\AI\Memory\Namespaces\Settings;

use Telnyx\AI\Memory\Namespaces\Settings\SettingPatchAllParams\Summary;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * Only the fields you send are changed; anything omitted is left as it is, so `{}` changes nothing. Sending `instructions: null`, or an empty or whitespace-only string, clears them and returns summaries to the neutral default.
 *
 * Instructions are capped at 2000 characters. A longer note is refused rather than truncated, because a note cut mid-sentence is a worse steer than none. A change reaches each summary the next time that summary is regenerated, not immediately.
 *
 * @see Telnyx\Services\AI\Memory\Namespaces\SettingsService::patchAll()
 *
 * @phpstan-import-type SummaryShape from \Telnyx\AI\Memory\Namespaces\Settings\SettingPatchAllParams\Summary
 *
 * @phpstan-type SettingPatchAllParamsShape = array{
 *   summary?: null|Summary|SummaryShape
 * }
 */
final class SettingPatchAllParams implements BaseModel
{
    /** @use SdkModel<SettingPatchAllParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A partial update to a namespace's summary settings.
     *
     * Only the fields present in the request are changed; the rest are left as
     * they are. Sending `instructions: null` (or empty) clears the instructions.
     */
    #[Optional(nullable: true)]
    public ?Summary $summary;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Omitted|Summary|SummaryShape|null $summary
     */
    public static function with(
        Omitted|Summary|array|null $summary = Omitted::VALUE
    ): self {
        $self = new self;

        Omitted::VALUE !== $summary && $self['summary'] = $summary;

        return $self;
    }

    /**
     * A partial update to a namespace's summary settings.
     *
     * Only the fields present in the request are changed; the rest are left as
     * they are. Sending `instructions: null` (or empty) clears the instructions.
     *
     * @param Summary|SummaryShape|null $summary
     */
    public function withSummary(Summary|array|null $summary): self
    {
        $self = clone $this;
        $self['summary'] = $summary;

        return $self;
    }
}
