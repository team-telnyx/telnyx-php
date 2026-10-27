<?php

declare(strict_types=1);

namespace Telnyx\PayConnectors;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PayConnectors\PayConnector\Config;
use Telnyx\PayConnectors\PayConnector\Mode;
use Telnyx\PayConnectors\PayConnector\RecordType;

/**
 * Organization-owned connector. Examples and config properties here describe generic connectors; listing is not restricted to that type unless filter[type]=generic is supplied. Passwords and bearer tokens are omitted, not masked. Defaults for auth_type and timeout need not appear in stored config.
 *
 * @phpstan-import-type ConfigShape from \Telnyx\PayConnectors\PayConnector\Config
 *
 * @phpstan-type PayConnectorShape = array{
 *   id?: string|null,
 *   config?: null|Config|ConfigShape,
 *   createdAt?: \DateTimeInterface|null,
 *   mode?: null|Mode|value-of<Mode>,
 *   name?: string|null,
 *   organizationID?: string|null,
 *   recordType?: null|RecordType|value-of<RecordType>,
 *   type?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   userID?: string|null,
 * }
 */
final class PayConnector implements BaseModel
{
    /** @use SdkModel<PayConnectorShape> */
    use SdkModel;

    /**
     * Connector identifier.
     */
    #[Optional]
    public ?string $id;

    /**
     * Redacted stored configuration. Generic connector fields are shown here. Unknown config keys are discarded. Password and token are never returned.
     */
    #[Optional]
    public ?Config $config;

    /**
     * Creation time.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * Configured mode.
     *
     * @var value-of<Mode>|null $mode
     */
    #[Optional(enum: Mode::class)]
    public ?string $mode;

    /**
     * Connector name used for retrieval, update, deletion and Pay.
     */
    #[Optional]
    public ?string $name;

    /**
     * Owning organization; assigned from authentication, not request input.
     */
    #[Optional('organization_id')]
    public ?string $organizationID;

    /**
     * Resource type.
     *
     * @var value-of<RecordType>|null $recordType
     */
    #[Optional('record_type', enum: RecordType::class)]
    public ?string $recordType;

    /**
     * Connector type; generic is covered by this reference. Other types may appear in unfiltered lists.
     */
    #[Optional]
    public ?string $type;

    /**
     * Last update time.
     */
    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    /**
     * Creating user; assigned from authentication, not request input.
     */
    #[Optional('user_id')]
    public ?string $userID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Config|ConfigShape|null $config
     * @param Mode|value-of<Mode>|null $mode
     * @param RecordType|value-of<RecordType>|null $recordType
     */
    public static function with(
        ?string $id = null,
        Config|array|null $config = null,
        ?\DateTimeInterface $createdAt = null,
        Mode|string|null $mode = null,
        ?string $name = null,
        ?string $organizationID = null,
        RecordType|string|null $recordType = null,
        ?string $type = null,
        ?\DateTimeInterface $updatedAt = null,
        ?string $userID = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $config && $self['config'] = $config;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $mode && $self['mode'] = $mode;
        null !== $name && $self['name'] = $name;
        null !== $organizationID && $self['organizationID'] = $organizationID;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $type && $self['type'] = $type;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $userID && $self['userID'] = $userID;

        return $self;
    }

    /**
     * Connector identifier.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Redacted stored configuration. Generic connector fields are shown here. Unknown config keys are discarded. Password and token are never returned.
     *
     * @param Config|ConfigShape $config
     */
    public function withConfig(Config|array $config): self
    {
        $self = clone $this;
        $self['config'] = $config;

        return $self;
    }

    /**
     * Creation time.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Configured mode.
     *
     * @param Mode|value-of<Mode> $mode
     */
    public function withMode(Mode|string $mode): self
    {
        $self = clone $this;
        $self['mode'] = $mode;

        return $self;
    }

    /**
     * Connector name used for retrieval, update, deletion and Pay.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Owning organization; assigned from authentication, not request input.
     */
    public function withOrganizationID(string $organizationID): self
    {
        $self = clone $this;
        $self['organizationID'] = $organizationID;

        return $self;
    }

    /**
     * Resource type.
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Connector type; generic is covered by this reference. Other types may appear in unfiltered lists.
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Last update time.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Creating user; assigned from authentication, not request input.
     */
    public function withUserID(string $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }
}
