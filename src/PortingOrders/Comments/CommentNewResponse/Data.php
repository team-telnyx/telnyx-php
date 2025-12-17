<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\Comments\CommentNewResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\Comments\CommentNewResponse\Data\UserType;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   body?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   portingOrderID?: string|null,
 *   recordType?: string|null,
 *   userType?: null|UserType|value-of<UserType>,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    /**
     * Body of comment.
     */
    #[Optional]
    public ?string $body;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    #[Optional('porting_order_id')]
    public ?string $portingOrderID;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * Indicates whether this comment was created by a Telnyx Admin, user, or system.
     *
     * @var value-of<UserType>|null $userType
     */
    #[Optional('user_type', enum: UserType::class)]
    public ?string $userType;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param UserType|value-of<UserType>|null $userType
     */
    public static function with(
        ?string $id = null,
        ?string $body = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $portingOrderID = null,
        ?string $recordType = null,
        UserType|string|null $userType = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $body && $self['body'] = $body;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $portingOrderID && $self['portingOrderID'] = $portingOrderID;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $userType && $self['userType'] = $userType;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Body of comment.
     */
    public function withBody(string $body): self
    {
        $self = clone $this;
        $self['body'] = $body;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withPortingOrderID(string $portingOrderID): self
    {
        $self = clone $this;
        $self['portingOrderID'] = $portingOrderID;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Indicates whether this comment was created by a Telnyx Admin, user, or system.
     *
     * @param UserType|value-of<UserType> $userType
     */
    public function withUserType(UserType|string $userType): self
    {
        $self = clone $this;
        $self['userType'] = $userType;

        return $self;
    }
}
