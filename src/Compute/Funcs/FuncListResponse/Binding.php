<?php

declare(strict_types=1);

namespace Telnyx\Compute\Funcs\FuncListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * A function-scoped binding persisted at ship time. For binding_type=actor, actor_type is the referenced Stateful Actor type and env_name is the binding name exposed to the function.
 *
 * @phpstan-type BindingShape = array{
 *   actorType?: string|null,
 *   bindingID?: string|null,
 *   bindingType?: string|null,
 *   bucketID?: string|null,
 *   createdAt?: string|null,
 *   envName?: string|null,
 *   funcID?: string|null,
 *   kvID?: string|null,
 *   recordType?: string|null,
 *   secretName?: string|null,
 *   sqldbID?: string|null,
 *   status?: string|null,
 *   updatedAt?: string|null,
 * }
 */
final class Binding implements BaseModel
{
    /** @use SdkModel<BindingShape> */
    use SdkModel;

    #[Optional('actor_type')]
    public ?string $actorType;

    #[Optional('binding_id')]
    public ?string $bindingID;

    #[Optional('binding_type')]
    public ?string $bindingType;

    #[Optional('bucket_id')]
    public ?string $bucketID;

    #[Optional('created_at')]
    public ?string $createdAt;

    #[Optional('env_name')]
    public ?string $envName;

    #[Optional('func_id')]
    public ?string $funcID;

    #[Optional('kv_id')]
    public ?string $kvID;

    #[Optional('record_type')]
    public ?string $recordType;

    #[Optional('secret_name')]
    public ?string $secretName;

    #[Optional('sqldb_id')]
    public ?string $sqldbID;

    #[Optional]
    public ?string $status;

    #[Optional('updated_at')]
    public ?string $updatedAt;

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
        ?string $actorType = null,
        ?string $bindingID = null,
        ?string $bindingType = null,
        ?string $bucketID = null,
        ?string $createdAt = null,
        ?string $envName = null,
        ?string $funcID = null,
        ?string $kvID = null,
        ?string $recordType = null,
        ?string $secretName = null,
        ?string $sqldbID = null,
        ?string $status = null,
        ?string $updatedAt = null,
    ): self {
        $self = new self;

        null !== $actorType && $self['actorType'] = $actorType;
        null !== $bindingID && $self['bindingID'] = $bindingID;
        null !== $bindingType && $self['bindingType'] = $bindingType;
        null !== $bucketID && $self['bucketID'] = $bucketID;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $envName && $self['envName'] = $envName;
        null !== $funcID && $self['funcID'] = $funcID;
        null !== $kvID && $self['kvID'] = $kvID;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $secretName && $self['secretName'] = $secretName;
        null !== $sqldbID && $self['sqldbID'] = $sqldbID;
        null !== $status && $self['status'] = $status;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withActorType(string $actorType): self
    {
        $self = clone $this;
        $self['actorType'] = $actorType;

        return $self;
    }

    public function withBindingID(string $bindingID): self
    {
        $self = clone $this;
        $self['bindingID'] = $bindingID;

        return $self;
    }

    public function withBindingType(string $bindingType): self
    {
        $self = clone $this;
        $self['bindingType'] = $bindingType;

        return $self;
    }

    public function withBucketID(string $bucketID): self
    {
        $self = clone $this;
        $self['bucketID'] = $bucketID;

        return $self;
    }

    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withEnvName(string $envName): self
    {
        $self = clone $this;
        $self['envName'] = $envName;

        return $self;
    }

    public function withFuncID(string $funcID): self
    {
        $self = clone $this;
        $self['funcID'] = $funcID;

        return $self;
    }

    public function withKvID(string $kvID): self
    {
        $self = clone $this;
        $self['kvID'] = $kvID;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    public function withSecretName(string $secretName): self
    {
        $self = clone $this;
        $self['secretName'] = $secretName;

        return $self;
    }

    public function withSqldbID(string $sqldbID): self
    {
        $self = clone $this;
        $self['sqldbID'] = $sqldbID;

        return $self;
    }

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
