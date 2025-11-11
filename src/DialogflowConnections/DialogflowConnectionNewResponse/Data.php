<?php

declare(strict_types=1);

namespace Telnyx\DialogflowConnections\DialogflowConnectionNewResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   connection_id?: string|null,
 *   conversation_profile_id?: string|null,
 *   environment?: string|null,
 *   record_type?: string|null,
 *   service_account?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Uniquely identifies a Telnyx application (Call Control).
     */
    #[Api(optional: true)]
    public ?string $connection_id;

    /**
     * The id of a configured conversation profile on your Dialogflow account. (If you use Dialogflow CX, this param is required).
     */
    #[Api(optional: true)]
    public ?string $conversation_profile_id;

    /**
     * Which Dialogflow environment will be used.
     */
    #[Api(optional: true)]
    public ?string $environment;

    #[Api(optional: true)]
    public ?string $record_type;

    /**
     * The JSON map to connect your Dialoglow account.
     */
    #[Api(optional: true)]
    public ?string $service_account;

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
        ?string $connection_id = null,
        ?string $conversation_profile_id = null,
        ?string $environment = null,
        ?string $record_type = null,
        ?string $service_account = null,
    ): self {
        $obj = new self;

        null !== $connection_id && $obj->connection_id = $connection_id;
        null !== $conversation_profile_id && $obj->conversation_profile_id = $conversation_profile_id;
        null !== $environment && $obj->environment = $environment;
        null !== $record_type && $obj->record_type = $record_type;
        null !== $service_account && $obj->service_account = $service_account;

        return $obj;
    }

    /**
     * Uniquely identifies a Telnyx application (Call Control).
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connection_id = $connectionID;

        return $obj;
    }

    /**
     * The id of a configured conversation profile on your Dialogflow account. (If you use Dialogflow CX, this param is required).
     */
    public function withConversationProfileID(
        string $conversationProfileID
    ): self {
        $obj = clone $this;
        $obj->conversation_profile_id = $conversationProfileID;

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

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->record_type = $recordType;

        return $obj;
    }

    /**
     * The JSON map to connect your Dialoglow account.
     */
    public function withServiceAccount(string $serviceAccount): self
    {
        $obj = clone $this;
        $obj->service_account = $serviceAccount;

        return $obj;
    }
}
