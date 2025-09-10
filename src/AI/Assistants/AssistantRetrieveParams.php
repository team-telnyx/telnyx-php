<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new AssistantRetrieveParams); // set properties as needed
 * $client->ai.assistants->retrieve(...$params->toArray());
 * ```
 * Retrieve an AI Assistant configuration by `assistant_id`.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->ai.assistants->retrieve(...$params->toArray());`
 *
 * @see Telnyx\AI\Assistants->retrieve
 *
 * @phpstan-type assistant_retrieve_params = array{
 *   callControlID?: string,
 *   fetchDynamicVariablesFromWebhook?: bool,
 *   from?: string,
 *   to?: string,
 * }
 */
final class AssistantRetrieveParams implements BaseModel
{
    /** @use SdkModel<assistant_retrieve_params> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?string $callControlID;

    #[Api(optional: true)]
    public ?bool $fetchDynamicVariablesFromWebhook;

    #[Api(optional: true)]
    public ?string $from;

    #[Api(optional: true)]
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
        $obj = new self;

        null !== $callControlID && $obj->callControlID = $callControlID;
        null !== $fetchDynamicVariablesFromWebhook && $obj->fetchDynamicVariablesFromWebhook = $fetchDynamicVariablesFromWebhook;
        null !== $from && $obj->from = $from;
        null !== $to && $obj->to = $to;

        return $obj;
    }

    public function withCallControlID(string $callControlID): self
    {
        $obj = clone $this;
        $obj->callControlID = $callControlID;

        return $obj;
    }

    public function withFetchDynamicVariablesFromWebhook(
        bool $fetchDynamicVariablesFromWebhook
    ): self {
        $obj = clone $this;
        $obj->fetchDynamicVariablesFromWebhook = $fetchDynamicVariablesFromWebhook;

        return $obj;
    }

    public function withFrom(string $from): self
    {
        $obj = clone $this;
        $obj->from = $from;

        return $obj;
    }

    public function withTo(string $to): self
    {
        $obj = clone $this;
        $obj->to = $to;

        return $obj;
    }
}
