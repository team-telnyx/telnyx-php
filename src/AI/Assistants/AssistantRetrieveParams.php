<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Retrieve an AI Assistant configuration by `assistant_id`.
 *
 * @see Telnyx\Services\AI\AssistantsService::retrieve()
 *
 * @phpstan-type AssistantRetrieveParamsShape = array{
 *   callControlID?: string|null,
 *   fetchDynamicVariablesFromWebhook?: bool|null,
 *   from?: string|null,
 *   to?: string|null,
 * }
 */
final class AssistantRetrieveParams implements BaseModel
{
    /** @use SdkModel<AssistantRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $callControlID;

    #[Optional]
    public ?bool $fetchDynamicVariablesFromWebhook;

    #[Optional]
    public ?string $from;

    #[Optional]
    public ?string $to;

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
        ?string $callControlID = null,
        ?bool $fetchDynamicVariablesFromWebhook = null,
        ?string $from = null,
        ?string $to = null,
    ): self {
        $self = new self;

        null !== $callControlID && $self['callControlID'] = $callControlID;
        null !== $fetchDynamicVariablesFromWebhook && $self['fetchDynamicVariablesFromWebhook'] = $fetchDynamicVariablesFromWebhook;
        null !== $from && $self['from'] = $from;
        null !== $to && $self['to'] = $to;

        return $self;
    }

    public function withCallControlID(string $callControlID): self
    {
        $self = clone $this;
        $self['callControlID'] = $callControlID;

        return $self;
    }

    public function withFetchDynamicVariablesFromWebhook(
        bool $fetchDynamicVariablesFromWebhook
    ): self {
        $self = clone $this;
        $self['fetchDynamicVariablesFromWebhook'] = $fetchDynamicVariablesFromWebhook;

        return $self;
    }

    public function withFrom(string $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    public function withTo(string $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }
}
