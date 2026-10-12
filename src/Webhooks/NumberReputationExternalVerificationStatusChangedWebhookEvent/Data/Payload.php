<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\NumberReputationExternalVerificationStatusChangedWebhookEvent\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;
use Telnyx\Webhooks\NumberReputationExternalVerificationStatusChangedWebhookEvent\Data\Payload\RecordType;
use Telnyx\Webhooks\NumberReputationExternalVerificationStatusChangedWebhookEvent\Data\Payload\Status;

/**
 * @phpstan-type PayloadShape = array{
 *   enterpriseID: string,
 *   recordType: \Telnyx\Webhooks\NumberReputationExternalVerificationStatusChangedWebhookEvent\Data\Payload\RecordType|value-of<\Telnyx\Webhooks\NumberReputationExternalVerificationStatusChangedWebhookEvent\Data\Payload\RecordType>,
 *   reviewedAt: \DateTimeInterface,
 *   status: Status|value-of<Status>,
 *   rejectionReason?: string|null,
 * }
 */
final class Payload implements BaseModel
{
    /** @use SdkModel<PayloadShape> */
    use SdkModel;

    #[Required('enterprise_id')]
    public string $enterpriseID;

    /**
     * @var value-of<RecordType> $recordType
     */
    #[Required(
        'record_type',
        enum: RecordType::class,
    )]
    public string $recordType;

    /**
     * When the review decision was made. Always set: this event is only sent after a review.
     */
    #[Required('reviewed_at')]
    public \DateTimeInterface $reviewedAt;

    /**
     * The review outcome. `pending` is never delivered: the event is sent only once the proof is reviewed.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * Set only when `status` is `rejected`.
     */
    #[Optional('rejection_reason', nullable: true)]
    public ?string $rejectionReason;

    /**
     * `new Payload()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Payload::with(enterpriseID: ..., recordType: ..., reviewedAt: ..., status: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Payload)
     *   ->withEnterpriseID(...)
     *   ->withRecordType(...)
     *   ->withReviewedAt(...)
     *   ->withStatus(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param RecordType|value-of<RecordType> $recordType
     * @param Status|value-of<Status> $status
     */
    public static function with(
        string $enterpriseID,
        RecordType|string $recordType,
        \DateTimeInterface $reviewedAt,
        Status|string $status,
        string|Omitted|null $rejectionReason = Omitted::VALUE,
    ): self {
        $self = new self;

        $self['enterpriseID'] = $enterpriseID;
        $self['recordType'] = $recordType;
        $self['reviewedAt'] = $reviewedAt;
        $self['status'] = $status;

        Omitted::VALUE !== $rejectionReason && $self['rejectionReason'] = $rejectionReason;

        return $self;
    }

    public function withEnterpriseID(string $enterpriseID): self
    {
        $self = clone $this;
        $self['enterpriseID'] = $enterpriseID;

        return $self;
    }

    /**
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(
        RecordType|string $recordType,
    ): self {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * When the review decision was made. Always set: this event is only sent after a review.
     */
    public function withReviewedAt(\DateTimeInterface $reviewedAt): self
    {
        $self = clone $this;
        $self['reviewedAt'] = $reviewedAt;

        return $self;
    }

    /**
     * The review outcome. `pending` is never delivered: the event is sent only once the proof is reviewed.
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
     * Set only when `status` is `rejected`.
     */
    public function withRejectionReason(?string $rejectionReason): self
    {
        $self = clone $this;
        $self['rejectionReason'] = $rejectionReason;

        return $self;
    }
}
