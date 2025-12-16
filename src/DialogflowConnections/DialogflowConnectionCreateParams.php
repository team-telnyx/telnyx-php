<?php

declare(strict_types=1);

namespace Telnyx\DialogflowConnections;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DialogflowConnections\DialogflowConnectionCreateParams\DialogflowAPI;

/**
 * Save Dialogflow Credentiails to Telnyx, so it can be used with other Telnyx services.
 *
 * @see Telnyx\Services\DialogflowConnectionsService::create()
 *
 * @phpstan-type DialogflowConnectionCreateParamsShape = array{
 *   serviceAccount: array<string,mixed>,
 *   conversationProfileID?: string|null,
 *   dialogflowAPI?: null|DialogflowAPI|value-of<DialogflowAPI>,
 *   environment?: string|null,
 *   location?: string|null,
 * }
 */
final class DialogflowConnectionCreateParams implements BaseModel
{
    /** @use SdkModel<DialogflowConnectionCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The JSON map to connect your Dialoglow account.
     *
     * @var array<string,mixed> $serviceAccount
     */
    #[Required('service_account', map: 'mixed')]
    public array $serviceAccount;

    /**
     * The id of a configured conversation profile on your Dialogflow account. (If you use Dialogflow CX, this param is required).
     */
    #[Optional('conversation_profile_id')]
    public ?string $conversationProfileID;

    /**
     * Determine which Dialogflow will be used.
     *
     * @var value-of<DialogflowAPI>|null $dialogflowAPI
     */
    #[Optional('dialogflow_api', enum: DialogflowAPI::class)]
    public ?string $dialogflowAPI;

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
     * `new DialogflowConnectionCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DialogflowConnectionCreateParams::with(serviceAccount: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DialogflowConnectionCreateParams)->withServiceAccount(...)
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
     * @param array<string,mixed> $serviceAccount
     * @param DialogflowAPI|value-of<DialogflowAPI> $dialogflowAPI
     */
    public static function with(
        array $serviceAccount,
        ?string $conversationProfileID = null,
        DialogflowAPI|string|null $dialogflowAPI = null,
        ?string $environment = null,
        ?string $location = null,
    ): self {
        $self = new self;

        $self['serviceAccount'] = $serviceAccount;

        null !== $conversationProfileID && $self['conversationProfileID'] = $conversationProfileID;
        null !== $dialogflowAPI && $self['dialogflowAPI'] = $dialogflowAPI;
        null !== $environment && $self['environment'] = $environment;
        null !== $location && $self['location'] = $location;

        return $self;
    }

    /**
     * The JSON map to connect your Dialoglow account.
     *
     * @param array<string,mixed> $serviceAccount
     */
    public function withServiceAccount(array $serviceAccount): self
    {
        $self = clone $this;
        $self['serviceAccount'] = $serviceAccount;

        return $self;
    }

    /**
     * The id of a configured conversation profile on your Dialogflow account. (If you use Dialogflow CX, this param is required).
     */
    public function withConversationProfileID(
        string $conversationProfileID
    ): self {
        $self = clone $this;
        $self['conversationProfileID'] = $conversationProfileID;

        return $self;
    }

    /**
     * Determine which Dialogflow will be used.
     *
     * @param DialogflowAPI|value-of<DialogflowAPI> $dialogflowAPI
     */
    public function withDialogflowAPI(DialogflowAPI|string $dialogflowAPI): self
    {
        $self = clone $this;
        $self['dialogflowAPI'] = $dialogflowAPI;

        return $self;
    }

    /**
     * Which Dialogflow environment will be used.
     */
    public function withEnvironment(string $environment): self
    {
        $self = clone $this;
        $self['environment'] = $environment;

        return $self;
    }

    /**
     * The region of your agent is. (If you use Dialogflow CX, this param is required).
     */
    public function withLocation(string $location): self
    {
        $self = clone $this;
        $self['location'] = $location;

        return $self;
    }
}
