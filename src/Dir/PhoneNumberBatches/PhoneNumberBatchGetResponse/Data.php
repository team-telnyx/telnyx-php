<?php

declare(strict_types=1);

namespace Telnyx\Dir\PhoneNumberBatches\PhoneNumberBatchGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Dir\PhoneNumberBatches\PhoneNumberBatchGetResponse\Data\Document;
use Telnyx\Dir\PhoneNumberBatches\PhoneNumberBatchGetResponse\Data\PhoneNumber;
use Telnyx\Dir\PhoneNumberBatches\PhoneNumberBatchGetResponse\Data\Status;

/**
 * A phone-number batch groups all numbers added in a single bulk-add request. Telnyx vets the batch as a unit. The response embeds the full `phone_numbers` array so you can read per-number status without a separate call, plus a batch-level `status` summarising the unit's progress.
 *
 * @phpstan-import-type DocumentShape from \Telnyx\Dir\PhoneNumberBatches\PhoneNumberBatchGetResponse\Data\Document
 * @phpstan-import-type PhoneNumberShape from \Telnyx\Dir\PhoneNumberBatches\PhoneNumberBatchGetResponse\Data\PhoneNumber
 *
 * @phpstan-type DataShape = array{
 *   batchID?: string|null,
 *   dirDisplayName?: string|null,
 *   dirID?: string|null,
 *   documents?: list<Document|DocumentShape>|null,
 *   enterpriseID?: string|null,
 *   phoneNumbers?: list<PhoneNumber|PhoneNumberShape>|null,
 *   status?: null|Status|value-of<Status>,
 *   submittedAt?: \DateTimeInterface|null,
 *   totalCount?: int|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional('batch_id')]
    public ?string $batchID;

    /**
     * The DIR's display name at the time the batch was read.
     */
    #[Optional('dir_display_name')]
    public ?string $dirDisplayName;

    #[Optional('dir_id')]
    public ?string $dirID;

    /**
     * Documents attached to this batch (e.g. a Letter of Authorization). Empty when none were supplied at add time.
     *
     * @var list<Document>|null $documents
     */
    #[Optional(list: Document::class)]
    public ?array $documents;

    #[Optional('enterprise_id')]
    public ?string $enterpriseID;

    /**
     * All phone numbers in this batch, with per-number status.
     *
     * @var list<PhoneNumber>|null $phoneNumbers
     */
    #[Optional('phone_numbers', list: PhoneNumber::class)]
    public ?array $phoneNumbers;

    /**
     * Aggregate batch status. Mirrors the values used on individual phone numbers (`submitted`, `in_review`, `verified`, `unsuccessful`, `permanently_rejected`, etc.).
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * When the batch was created (and implicitly submitted for vetting).
     */
    #[Optional('submitted_at')]
    public ?\DateTimeInterface $submittedAt;

    /**
     * Number of phone numbers in this batch (length of `phone_numbers`).
     */
    #[Optional('total_count')]
    public ?int $totalCount;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Document|DocumentShape>|null $documents
     * @param list<PhoneNumber|PhoneNumberShape>|null $phoneNumbers
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        ?string $batchID = null,
        ?string $dirDisplayName = null,
        ?string $dirID = null,
        ?array $documents = null,
        ?string $enterpriseID = null,
        ?array $phoneNumbers = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $submittedAt = null,
        ?int $totalCount = null,
    ): self {
        $self = new self;

        null !== $batchID && $self['batchID'] = $batchID;
        null !== $dirDisplayName && $self['dirDisplayName'] = $dirDisplayName;
        null !== $dirID && $self['dirID'] = $dirID;
        null !== $documents && $self['documents'] = $documents;
        null !== $enterpriseID && $self['enterpriseID'] = $enterpriseID;
        null !== $phoneNumbers && $self['phoneNumbers'] = $phoneNumbers;
        null !== $status && $self['status'] = $status;
        null !== $submittedAt && $self['submittedAt'] = $submittedAt;
        null !== $totalCount && $self['totalCount'] = $totalCount;

        return $self;
    }

    public function withBatchID(string $batchID): self
    {
        $self = clone $this;
        $self['batchID'] = $batchID;

        return $self;
    }

    /**
     * The DIR's display name at the time the batch was read.
     */
    public function withDirDisplayName(string $dirDisplayName): self
    {
        $self = clone $this;
        $self['dirDisplayName'] = $dirDisplayName;

        return $self;
    }

    public function withDirID(string $dirID): self
    {
        $self = clone $this;
        $self['dirID'] = $dirID;

        return $self;
    }

    /**
     * Documents attached to this batch (e.g. a Letter of Authorization). Empty when none were supplied at add time.
     *
     * @param list<Document|DocumentShape> $documents
     */
    public function withDocuments(array $documents): self
    {
        $self = clone $this;
        $self['documents'] = $documents;

        return $self;
    }

    public function withEnterpriseID(string $enterpriseID): self
    {
        $self = clone $this;
        $self['enterpriseID'] = $enterpriseID;

        return $self;
    }

    /**
     * All phone numbers in this batch, with per-number status.
     *
     * @param list<PhoneNumber|PhoneNumberShape> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $self = clone $this;
        $self['phoneNumbers'] = $phoneNumbers;

        return $self;
    }

    /**
     * Aggregate batch status. Mirrors the values used on individual phone numbers (`submitted`, `in_review`, `verified`, `unsuccessful`, `permanently_rejected`, etc.).
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * When the batch was created (and implicitly submitted for vetting).
     */
    public function withSubmittedAt(\DateTimeInterface $submittedAt): self
    {
        $self = clone $this;
        $self['submittedAt'] = $submittedAt;

        return $self;
    }

    /**
     * Number of phone numbers in this batch (length of `phone_numbers`).
     */
    public function withTotalCount(int $totalCount): self
    {
        $self = clone $this;
        $self['totalCount'] = $totalCount;

        return $self;
    }
}
