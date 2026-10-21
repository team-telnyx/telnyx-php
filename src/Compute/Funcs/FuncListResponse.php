<?php

declare(strict_types=1);

namespace Telnyx\Compute\Funcs;

use Telnyx\Compute\Funcs\FuncListResponse\Binding;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type BindingShape from \Telnyx\Compute\Funcs\FuncListResponse\Binding
 *
 * @phpstan-type FuncListResponseShape = array{
 *   id?: string|null,
 *   bindings?: list<Binding|BindingShape>|null,
 *   createdAt?: string|null,
 *   invokeURL?: string|null,
 *   message?: string|null,
 *   name?: string|null,
 *   recordType?: string|null,
 *   status?: string|null,
 *   statusDetail?: string|null,
 *   updatedAt?: string|null,
 * }
 */
final class FuncListResponse implements BaseModel
{
    /** @use SdkModel<FuncListResponseShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    /**
     * Always present; empty when the function has no bindings.
     *
     * @var list<Binding>|null $bindings
     */
    #[Optional(list: Binding::class)]
    public ?array $bindings;

    #[Optional('created_at')]
    public ?string $createdAt;

    #[Optional('invoke_url')]
    public ?string $invokeURL;

    #[Optional]
    public ?string $message;

    #[Optional]
    public ?string $name;

    #[Optional('record_type')]
    public ?string $recordType;

    #[Optional]
    public ?string $status;

    #[Optional('status_detail')]
    public ?string $statusDetail;

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
     *
     * @param list<Binding|BindingShape>|null $bindings
     */
    public static function with(
        ?string $id = null,
        ?array $bindings = null,
        ?string $createdAt = null,
        ?string $invokeURL = null,
        ?string $message = null,
        ?string $name = null,
        ?string $recordType = null,
        ?string $status = null,
        ?string $statusDetail = null,
        ?string $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $bindings && $self['bindings'] = $bindings;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $invokeURL && $self['invokeURL'] = $invokeURL;
        null !== $message && $self['message'] = $message;
        null !== $name && $self['name'] = $name;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $status && $self['status'] = $status;
        null !== $statusDetail && $self['statusDetail'] = $statusDetail;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Always present; empty when the function has no bindings.
     *
     * @param list<Binding|BindingShape> $bindings
     */
    public function withBindings(array $bindings): self
    {
        $self = clone $this;
        $self['bindings'] = $bindings;

        return $self;
    }

    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withInvokeURL(string $invokeURL): self
    {
        $self = clone $this;
        $self['invokeURL'] = $invokeURL;

        return $self;
    }

    public function withMessage(string $message): self
    {
        $self = clone $this;
        $self['message'] = $message;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withStatusDetail(string $statusDetail): self
    {
        $self = clone $this;
        $self['statusDetail'] = $statusDetail;

        return $self;
    }

    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
