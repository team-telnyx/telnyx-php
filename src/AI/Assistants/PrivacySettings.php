<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type privacy_settings = array{dataRetention?: bool}
 */
final class PrivacySettings implements BaseModel
{
    /** @use SdkModel<privacy_settings> */
    use SdkModel;

    /**
     * If true, conversation history and insights will be stored. If false, they will not be stored. This in‑tool toggle governs solely the retention of conversation history and insights via the AI assistant. It has no effect on any separate recording, transcription, or storage configuration that you have set at the account, number, or application level. All such external settings remain in force regardless of your selection here.
     */
    #[Api('data_retention', optional: true)]
    public ?bool $dataRetention;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $dataRetention = null): self
    {
        $obj = new self;

        null !== $dataRetention && $obj->dataRetention = $dataRetention;

        return $obj;
    }

    /**
     * If true, conversation history and insights will be stored. If false, they will not be stored. This in‑tool toggle governs solely the retention of conversation history and insights via the AI assistant. It has no effect on any separate recording, transcription, or storage configuration that you have set at the account, number, or application level. All such external settings remain in force regardless of your selection here.
     */
    public function withDataRetention(bool $dataRetention): self
    {
        $obj = clone $this;
        $obj->dataRetention = $dataRetention;

        return $obj;
    }
}
