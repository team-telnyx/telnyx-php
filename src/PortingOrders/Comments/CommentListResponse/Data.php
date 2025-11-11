<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\Comments\CommentListResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\Comments\CommentListResponse\Data\UserType;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   body?: string|null,
 *   created_at?: \DateTimeInterface|null,
 *   porting_order_id?: string|null,
 *   record_type?: string|null,
 *   user_type?: value-of<UserType>|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
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
    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at;

    #[Api(optional: true)]
    public ?string $porting_order_id;

    /**
     * Identifies the type of the resource.
     */
    #[Api(optional: true)]
    public ?string $record_type;

    /**
     * Indicates whether this comment was created by a Telnyx Admin, user, or system.
     *
     * @var value-of<UserType>|null $user_type
     */
    #[Api(enum: UserType::class, optional: true)]
    public ?string $user_type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param UserType|value-of<UserType> $user_type
     */
    public static function with(
        ?string $id = null,
        ?string $body = null,
        ?\DateTimeInterface $created_at = null,
        ?string $porting_order_id = null,
        ?string $record_type = null,
        UserType|string|null $user_type = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $body && $obj->body = $body;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $porting_order_id && $obj->porting_order_id = $porting_order_id;
        null !== $record_type && $obj->record_type = $record_type;
        null !== $user_type && $obj['user_type'] = $user_type;

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
        $obj->created_at = $createdAt;

        return $obj;
    }

    public function withPortingOrderID(string $portingOrderID): self
    {
        $obj = clone $this;
        $obj->porting_order_id = $portingOrderID;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->record_type = $recordType;

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
        $obj['user_type'] = $userType;

        return $obj;
    }
}
