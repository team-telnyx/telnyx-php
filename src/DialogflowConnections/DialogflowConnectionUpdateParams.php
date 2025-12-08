<?php

declare(strict_types=1);

namespace Telnyx\DialogflowConnections;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DialogflowConnections\DialogflowConnectionUpdateParams\DialogflowAPI;

/**
 * Updates a stored Dialogflow Connection.
 *
 * @see Telnyx\Services\DialogflowConnectionsService::update()
 *
 * @phpstan-type DialogflowConnectionUpdateParamsShape = array{
 *   service_account: array<string,mixed>,
 *   conversation_profile_id?: string,
 *   dialogflow_api?: DialogflowAPI|value-of<DialogflowAPI>,
 *   environment?: string,
 *   location?: string,
 * }
 */
final class DialogflowConnectionUpdateParams implements BaseModel
{
    /** @use SdkModel<DialogflowConnectionUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The JSON map to connect your Dialoglow account.
     *
     * @var array<string,mixed> $service_account
     */
    #[Required(map: 'mixed')]
    public array $service_account;

    /**
     * The id of a configured conversation profile on your Dialogflow account. (If you use Dialogflow CX, this param is required).
     */
    #[Optional]
    public ?string $conversation_profile_id;

    /**
     * Determine which Dialogflow will be used.
     *
     * @var value-of<DialogflowAPI>|null $dialogflow_api
     */
    #[Optional(enum: DialogflowAPI::class)]
    public ?string $dialogflow_api;

    /**
     * Which Dialogflow environment will be used.
     */
    #[Optional]
    public ?string $environment;

    /**
     * The region of your agent is. (If you use Dialogflow CX, this param is required).
     */
    #[Optional]
    public ?string $location;

    /**
     * `new DialogflowConnectionUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DialogflowConnectionUpdateParams::with(service_account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DialogflowConnectionUpdateParams)->withServiceAccount(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string,mixed> $service_account
     * @param DialogflowAPI|value-of<DialogflowAPI> $dialogflow_api
     */
    public static function with(
        array $service_account,
        ?string $conversation_profile_id = null,
        DialogflowAPI|string|null $dialogflow_api = null,
        ?string $environment = null,
        ?string $location = null,
    ): self {
        $obj = new self;

        $obj['service_account'] = $service_account;

        null !== $conversation_profile_id && $obj['conversation_profile_id'] = $conversation_profile_id;
        null !== $dialogflow_api && $obj['dialogflow_api'] = $dialogflow_api;
        null !== $environment && $obj['environment'] = $environment;
        null !== $location && $obj['location'] = $location;

        return $obj;
    }

    /**
     * The JSON map to connect your Dialoglow account.
     *
     * @param array<string,mixed> $serviceAccount
     */
    public function withServiceAccount(array $serviceAccount): self
    {
        $obj = clone $this;
        $obj['service_account'] = $serviceAccount;

        return $obj;
    }

    /**
     * The id of a configured conversation profile on your Dialogflow account. (If you use Dialogflow CX, this param is required).
     */
    public function withConversationProfileID(
        string $conversationProfileID
    ): self {
        $obj = clone $this;
        $obj['conversation_profile_id'] = $conversationProfileID;

        return $obj;
    }

    /**
     * Determine which Dialogflow will be used.
     *
     * @param DialogflowAPI|value-of<DialogflowAPI> $dialogflowAPI
     */
    public function withDialogflowAPI(DialogflowAPI|string $dialogflowAPI): self
    {
        $obj = clone $this;
        $obj['dialogflow_api'] = $dialogflowAPI;

        return $obj;
    }

    /**
     * Which Dialogflow environment will be used.
     */
    public function withEnvironment(string $environment): self
    {
        $obj = clone $this;
        $obj['environment'] = $environment;

        return $obj;
    }

    /**
     * The region of your agent is. (If you use Dialogflow CX, this param is required).
     */
    public function withLocation(string $location): self
    {
        $obj = clone $this;
        $obj['location'] = $location;

        return $obj;
    }
}
