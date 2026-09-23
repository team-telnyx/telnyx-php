<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PrivacySettingsShape = array{
 *   dataRetention?: bool|null, inTransitDataLocality?: bool|null
 * }
 */
final class PrivacySettings implements BaseModel
{
    /** @use SdkModel<PrivacySettingsShape> */
    use SdkModel;

    /**
     * If true, conversation history and insights will be stored. If false, they will not be stored. This in‑tool toggle governs solely the retention of conversation history and insights via the AI assistant. It has no effect on any separate recording, transcription, or storage configuration that you have set at the account, number, or application level. All such external settings remain in force regardless of your selection here.
     */
    #[Optional('data_retention')]
    public ?bool $dataRetention;

    /**
     * Requires every model call made for a web chat turn to be received and served inside your organization's data-locality region, rather than only stored there. Applies to web chat only — voice and messaging assistants are unaffected. Enabling it requires a data-locality region with in-region inference (USA, EU, AUS, UAE; see [Inference regions](https://developers.telnyx.com/docs/inference/models/regions)) and Telnyx-hosted models for the assistant, its fallback, and any conversation-flow node that overrides the model; the request is rejected otherwise. Once enabled, send chat requests to your region's API hostname: a request entering the platform in another region is rejected rather than forwarded, because forwarding it would already have moved the content across the border. Defaults to false.
     */
    #[Optional('in_transit_data_locality')]
    public ?bool $inTransitDataLocality;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?bool $dataRetention = null,
        ?bool $inTransitDataLocality = null
    ): self {
        $self = new self;

        null !== $dataRetention && $self['dataRetention'] = $dataRetention;
        null !== $inTransitDataLocality && $self['inTransitDataLocality'] = $inTransitDataLocality;

        return $self;
    }

    /**
     * If true, conversation history and insights will be stored. If false, they will not be stored. This in‑tool toggle governs solely the retention of conversation history and insights via the AI assistant. It has no effect on any separate recording, transcription, or storage configuration that you have set at the account, number, or application level. All such external settings remain in force regardless of your selection here.
     */
    public function withDataRetention(bool $dataRetention): self
    {
        $self = clone $this;
        $self['dataRetention'] = $dataRetention;

        return $self;
    }

    /**
     * Requires every model call made for a web chat turn to be received and served inside your organization's data-locality region, rather than only stored there. Applies to web chat only — voice and messaging assistants are unaffected. Enabling it requires a data-locality region with in-region inference (USA, EU, AUS, UAE; see [Inference regions](https://developers.telnyx.com/docs/inference/models/regions)) and Telnyx-hosted models for the assistant, its fallback, and any conversation-flow node that overrides the model; the request is rejected otherwise. Once enabled, send chat requests to your region's API hostname: a request entering the platform in another region is rejected rather than forwarded, because forwarding it would already have moved the content across the border. Defaults to false.
     */
    public function withInTransitDataLocality(bool $inTransitDataLocality): self
    {
        $self = clone $this;
        $self['inTransitDataLocality'] = $inTransitDataLocality;

        return $self;
    }
}
