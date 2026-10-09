<?php

declare(strict_types=1);

namespace Telnyx\Dir\DirGetBpoAuthorizationsResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;
use Telnyx\Dir\DirGetBpoAuthorizationsResponse\Data\RecordType;
use Telnyx\Dir\DirGetBpoAuthorizationsResponse\Data\Status;

/**
 * A single authorization of a BPO (Business Process Outsourcer) account on a DIR.
 *
 * @phpstan-type DataShape = array{
 *   bpoEnterpriseID: string,
 *   loaDocumentID: string,
 *   recordType: RecordType|value-of<RecordType>,
 *   status: Status|value-of<Status>,
 *   rejectionReason?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * The authorized BPO account's enterprise id.
     */
    #[Required('bpo_enterprise_id')]
    public string $bpoEnterpriseID;

    /**
     * Id of the signed Letter of Authorization document submitted for this BPO. Send it back unchanged in `bpo_authorizations` when updating the DIR to keep this authorization and its review state.
     */
    #[Required('loa_document_id')]
    public string $loaDocumentID;

    /**
     * Always `bpo_authorization`.
     *
     * @var value-of<RecordType> $recordType
     */
    #[Required('record_type', enum: RecordType::class)]
    public string $recordType;

    /**
     * Review state of this authorization. `pending` on create or when the Letter of Authorization is re-uploaded; an admin moves it to `approved` or `rejected`. Only an `approved` authorization adds the BPO to this DIR's authorized callers in the branded calling registry.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * Why the authorization was rejected. `null` unless `status` is `rejected`.
     */
    #[Optional('rejection_reason', nullable: true)]
    public ?string $rejectionReason;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   bpoEnterpriseID: ..., loaDocumentID: ..., recordType: ..., status: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withBpoEnterpriseID(...)
     *   ->withLoaDocumentID(...)
     *   ->withRecordType(...)
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
        string $bpoEnterpriseID,
        string $loaDocumentID,
        RecordType|string $recordType,
        Status|string $status,
        string|Omitted|null $rejectionReason = Omitted::VALUE,
    ): self {
        $self = new self;

        $self['bpoEnterpriseID'] = $bpoEnterpriseID;
        $self['loaDocumentID'] = $loaDocumentID;
        $self['recordType'] = $recordType;
        $self['status'] = $status;

        Omitted::VALUE !== $rejectionReason && $self['rejectionReason'] = $rejectionReason;

        return $self;
    }

    /**
     * The authorized BPO account's enterprise id.
     */
    public function withBpoEnterpriseID(string $bpoEnterpriseID): self
    {
        $self = clone $this;
        $self['bpoEnterpriseID'] = $bpoEnterpriseID;

        return $self;
    }

    /**
     * Id of the signed Letter of Authorization document submitted for this BPO. Send it back unchanged in `bpo_authorizations` when updating the DIR to keep this authorization and its review state.
     */
    public function withLoaDocumentID(string $loaDocumentID): self
    {
        $self = clone $this;
        $self['loaDocumentID'] = $loaDocumentID;

        return $self;
    }

    /**
     * Always `bpo_authorization`.
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
     * Review state of this authorization. `pending` on create or when the Letter of Authorization is re-uploaded; an admin moves it to `approved` or `rejected`. Only an `approved` authorization adds the BPO to this DIR's authorized callers in the branded calling registry.
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
     * Why the authorization was rejected. `null` unless `status` is `rejected`.
     */
    public function withRejectionReason(?string $rejectionReason): self
    {
        $self = clone $this;
        $self['rejectionReason'] = $rejectionReason;

        return $self;
    }
}
