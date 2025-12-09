<?php

declare(strict_types=1);

namespace Telnyx\DialogflowConnections\DialogflowConnectionUpdateResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   connectionID?: string|null,
 *   conversationProfileID?: string|null,
 *   environment?: string|null,
 *   recordType?: string|null,
 *   serviceAccount?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Uniquely identifies a Telnyx application (Call Control).
     */
    #[Optional('connection_id')]
    public ?string $connectionID;

    /**
     * The id of a configured conversation profile on your Dialogflow account. (If you use Dialogflow CX, this param is required).
     */
    #[Optional('conversation_profile_id')]
    public ?string $conversationProfileID;

    /**
     * Which Dialogflow environment will be used.
     */
    #[Optional]
    public ?string $environment;

    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * The JSON map to connect your Dialoglow account.
     */
    #[Optional('service_account')]
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

        null !== $connectionID && $obj['connectionID'] = $connectionID;
        null !== $conversationProfileID && $obj['conversationProfileID'] = $conversationProfileID;
        null !== $environment && $obj['environment'] = $environment;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $serviceAccount && $obj['serviceAccount'] = $serviceAccount;

        return $obj;
    }

    /**
     * Uniquely identifies a Telnyx application (Call Control).
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj['connectionID'] = $connectionID;

        return $obj;
    }

    /**
     * The id of a configured conversation profile on your Dialogflow account. (If you use Dialogflow CX, this param is required).
     */
    public function withConversationProfileID(
        string $conversationProfileID
    ): self {
        $obj = clone $this;
        $obj['conversationProfileID'] = $conversationProfileID;

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

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * The JSON map to connect your Dialoglow account.
     */
    public function withServiceAccount(string $serviceAccount): self
    {
        $obj = clone $this;
        $obj['serviceAccount'] = $serviceAccount;

        return $obj;
    }
}
