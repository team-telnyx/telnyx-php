<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PrivacySettingsShape = array{dataRetention?: bool|null}
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

        null !== $dataRetention && $obj['dataRetention'] = $dataRetention;

        return $obj;
    }

    /**
     * If true, conversation history and insights will be stored. If false, they will not be stored. This in‑tool toggle governs solely the retention of conversation history and insights via the AI assistant. It has no effect on any separate recording, transcription, or storage configuration that you have set at the account, number, or application level. All such external settings remain in force regardless of your selection here.
     */
    public function withDataRetention(bool $dataRetention): self
    {
        $obj = clone $this;
        $obj['dataRetention'] = $dataRetention;

        return $obj;
    }
}
