<?php

declare(strict_types=1);

namespace Telnyx\DialogflowConnections;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DialogflowConnections\DialogflowConnectionUpdateParams\DialogflowAPI;

/**
 * Updates a stored Dialogflow Connection.
 *
 * @see Telnyx\DialogflowConnections->update
 *
 * @phpstan-type DialogflowConnectionUpdateParamsShape = array{
 *   serviceAccount: array<string, mixed>,
 *   conversationProfileID?: string,
 *   dialogflowAPI?: DialogflowAPI|value-of<DialogflowAPI>,
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
     * @var array<string, mixed> $serviceAccount
     */
    #[Api('service_account', map: 'mixed')]
    public array $serviceAccount;

    /**
     * The id of a configured conversation profile on your Dialogflow account. (If you use Dialogflow CX, this param is required).
     */
    #[Api('conversation_profile_id', optional: true)]
    public ?string $conversationProfileID;

    /**
     * Determine which Dialogflow will be used.
     *
     * @var value-of<DialogflowAPI>|null $dialogflowAPI
     */
    #[Api('dialogflow_api', enum: DialogflowAPI::class, optional: true)]
    public ?string $dialogflowAPI;

    /**
     * Which Dialogflow environment will be used.
     */
    #[Api(optional: true)]
    public ?string $environment;

    /**
     * The region of your agent is. (If you use Dialogflow CX, this param is required).
     */
    #[Api(optional: true)]
    public ?string $location;

    /**
     * `new DialogflowConnectionUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DialogflowConnectionUpdateParams::with(serviceAccount: ...)
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
     * @param array<string, mixed> $serviceAccount
     * @param DialogflowAPI|value-of<DialogflowAPI> $dialogflowAPI
     */
    public static function with(
        array $serviceAccount,
        ?string $conversationProfileID = null,
        DialogflowAPI|string|null $dialogflowAPI = null,
        ?string $environment = null,
        ?string $location = null,
    ): self {
        $obj = new self;

        $obj->serviceAccount = $serviceAccount;

        null !== $conversationProfileID && $obj->conversationProfileID = $conversationProfileID;
        null !== $dialogflowAPI && $obj['dialogflowAPI'] = $dialogflowAPI;
        null !== $environment && $obj->environment = $environment;
        null !== $location && $obj->location = $location;

        return $obj;
    }

    /**
     * The JSON map to connect your Dialoglow account.
     *
     * @param array<string, mixed> $serviceAccount
     */
    public function withServiceAccount(array $serviceAccount): self
    {
        $obj = clone $this;
        $obj->serviceAccount = $serviceAccount;

        return $obj;
    }

    /**
     * The id of a configured conversation profile on your Dialogflow account. (If you use Dialogflow CX, this param is required).
     */
    public function withConversationProfileID(
        string $conversationProfileID
    ): self {
        $obj = clone $this;
        $obj->conversationProfileID = $conversationProfileID;

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
        $obj['dialogflowAPI'] = $dialogflowAPI;

        return $obj;
    }

    /**
     * Which Dialogflow environment will be used.
     */
    public function withEnvironment(string $environment): self
    {
        $obj = clone $this;
        $obj->environment = $environment;

        return $obj;
    }

    /**
     * The region of your agent is. (If you use Dialogflow CX, this param is required).
     */
    public function withLocation(string $location): self
    {
        $obj = clone $this;
        $obj->location = $location;

        return $obj;
    }
}
