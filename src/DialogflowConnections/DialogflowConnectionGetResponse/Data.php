<?php

declare(strict_types=1);

namespace Telnyx\DialogflowConnections\DialogflowConnectionGetResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   connectionID?: string,
 *   conversationProfileID?: string,
 *   environment?: string,
 *   recordType?: string,
 *   serviceAccount?: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Uniquely identifies a Telnyx application (Call Control).
     */
    #[Api('connection_id', optional: true)]
    public ?string $connectionID;

    /**
     * The id of a configured conversation profile on your Dialogflow account. (If you use Dialogflow CX, this param is required).
     */
    #[Api('conversation_profile_id', optional: true)]
    public ?string $conversationProfileID;

    /**
     * Which Dialogflow environment will be used.
     */
    #[Api(optional: true)]
    public ?string $environment;

    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * The JSON map to connect your Dialoglow account.
     */
    #[Api('service_account', optional: true)]
    public ?string $serviceAccount;

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
        ?string $connectionID = null,
        ?string $conversationProfileID = null,
        ?string $environment = null,
        ?string $recordType = null,
        ?string $serviceAccount = null,
    ): self {
        $obj = new self;

        null !== $connectionID && $obj->connectionID = $connectionID;
        null !== $conversationProfileID && $obj->conversationProfileID = $conversationProfileID;
        null !== $environment && $obj->environment = $environment;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $serviceAccount && $obj->serviceAccount = $serviceAccount;

        return $obj;
    }

    /**
     * Uniquely identifies a Telnyx application (Call Control).
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connectionID = $connectionID;

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
        $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * The JSON map to connect your Dialoglow account.
     */
    public function withServiceAccount(string $serviceAccount): self
    {
        $obj = clone $this;
        $obj->serviceAccount = $serviceAccount;

        return $obj;
    }
}
