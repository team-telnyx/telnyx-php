<?php

declare(strict_types=1);

namespace Telnyx\CustomerServiceRecords;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CustomerServiceRecords\CustomerServiceRecord\Result;
use Telnyx\CustomerServiceRecords\CustomerServiceRecord\Status;

/**
 * @phpstan-type customer_service_record = array{
 *   id?: string,
 *   createdAt?: \DateTimeInterface,
 *   errorMessage?: string,
 *   phoneNumber?: string,
 *   recordType?: string,
 *   result?: Result,
 *   status?: value-of<Status>,
 *   updatedAt?: \DateTimeInterface,
 * }
 */
final class CustomerServiceRecord implements BaseModel
{
    /** @use SdkModel<customer_service_record> */
    use SdkModel;

    /**
     * Uniquely identifies this customer service record.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * The error message in case status is `failed`. This field would be null in case of `pending` or `completed` status.
     */
    #[Api('error_message', optional: true)]
    public ?string $errorMessage;

    /**
     * The phone number of the customer service record.
     */
    #[Api('phone_number', optional: true)]
    public ?string $phoneNumber;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * The result of the CSR request. This field would be null in case of `pending` or `failed` status.
     */
    #[Api(optional: true)]
    public ?Result $result;

    /**
     * The status of the customer service record.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api('updated_at', optional: true)]
    public ?\DateTimeInterface $updatedAt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $errorMessage = null,
        ?string $phoneNumber = null,
        ?string $recordType = null,
        ?Result $result = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $errorMessage && $obj->errorMessage = $errorMessage;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $result && $obj->result = $result;
        null !== $status && $obj->status = $status instanceof Status ? $status->value : $status;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * Uniquely identifies this customer service record.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

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

    /**
     * The error message in case status is `failed`. This field would be null in case of `pending` or `completed` status.
     */
    public function withErrorMessage(string $errorMessage): self
    {
        $obj = clone $this;
        $obj->errorMessage = $errorMessage;

        return $obj;
    }

    /**
     * The phone number of the customer service record.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

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
     * The result of the CSR request. This field would be null in case of `pending` or `failed` status.
     */
    public function withResult(Result $result): self
    {
        $obj = clone $this;
        $obj->result = $result;

        return $obj;
    }

    /**
     * The status of the customer service record.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj->status = $status instanceof Status ? $status->value : $status;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
