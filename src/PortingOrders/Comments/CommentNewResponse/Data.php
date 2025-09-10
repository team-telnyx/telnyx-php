<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\Comments\CommentNewResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\Comments\CommentNewResponse\Data\UserType;

/**
 * @phpstan-type data_alias = array{
 *   id?: string|null,
 *   body?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   portingOrderID?: string|null,
 *   recordType?: string|null,
 *   userType?: value-of<UserType>|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $id;

    /**
     * Body of comment.
     */
    #[Api(optional: true)]
    public ?string $body;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

    #[Api('porting_order_id', optional: true)]
    public ?string $portingOrderID;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * Indicates whether this comment was created by a Telnyx Admin, user, or system.
     *
     * @var value-of<UserType>|null $userType
     */
    #[Api('user_type', enum: UserType::class, optional: true)]
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
     * @param UserType|value-of<UserType> $userType
     */
    public static function with(
        ?string $id = null,
        ?string $body = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $portingOrderID = null,
        ?string $recordType = null,
        UserType|string|null $userType = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $body && $obj->body = $body;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $portingOrderID && $obj->portingOrderID = $portingOrderID;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $userType && $obj->userType = $userType instanceof UserType ? $userType->value : $userType;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Body of comment.
     */
    public function withBody(string $body): self
    {
        $obj = clone $this;
        $obj->body = $body;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withPortingOrderID(string $portingOrderID): self
    {
        $obj = clone $this;
        $obj->portingOrderID = $portingOrderID;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * Indicates whether this comment was created by a Telnyx Admin, user, or system.
     *
     * @param UserType|value-of<UserType> $userType
     */
    public function withUserType(UserType|string $userType): self
    {
        $obj = clone $this;
        $obj->userType = $userType instanceof UserType ? $userType->value : $userType;

        return $obj;
    }
}
