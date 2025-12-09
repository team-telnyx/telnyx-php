<?php

declare(strict_types=1);

namespace Telnyx\DialogflowConnections\DialogflowConnectionNewResponse;

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
        $self = new self;

        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $conversationProfileID && $self['conversationProfileID'] = $conversationProfileID;
        null !== $environment && $self['environment'] = $environment;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $serviceAccount && $self['serviceAccount'] = $serviceAccount;

        return $self;
    }

    /**
     * Uniquely identifies a Telnyx application (Call Control).
     */
    public function withConnectionID(string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

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
     * Which Dialogflow environment will be used.
     */
    public function withEnvironment(string $environment): self
    {
        $self = clone $this;
        $self['environment'] = $environment;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * The JSON map to connect your Dialoglow account.
     */
    public function withServiceAccount(string $serviceAccount): self
    {
        $self = clone $this;
        $self['serviceAccount'] = $serviceAccount;

        return $self;
    }
}
