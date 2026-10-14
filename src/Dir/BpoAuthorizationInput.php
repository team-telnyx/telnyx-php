<?php

declare(strict_types=1);

namespace Telnyx\Dir;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * One authorization to include when creating or updating a DIR: an approved BPO (Business Process Outsourcer) account plus the signed Letter of Authorization the Brand Owner granted it.
 *
 * @phpstan-type BpoAuthorizationInputShape = array{
 *   bpoEnterpriseID: string, loaDocumentID: string
 * }
 */
final class BpoAuthorizationInput implements BaseModel
{
    /** @use SdkModel<BpoAuthorizationInputShape> */
    use SdkModel;

    /**
     * Enterprise id of an approved BPO (Business Process Outsourcer) account on your organization to authorize for this DIR.
     */
    #[Required('bpo_enterprise_id')]
    public string $bpoEnterpriseID;

    /**
     * Id of the signed Letter of Authorization document (uploaded via the Telnyx Documents API) in which the Brand Owner authorizes this BPO.
     */
    #[Required('loa_document_id')]
    public string $loaDocumentID;

    /**
     * `new BpoAuthorizationInput()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BpoAuthorizationInput::with(bpoEnterpriseID: ..., loaDocumentID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BpoAuthorizationInput)->withBpoEnterpriseID(...)->withLoaDocumentID(...)
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
     */
    public static function with(
        string $bpoEnterpriseID,
        string $loaDocumentID
    ): self {
        $self = new self;

        $self['bpoEnterpriseID'] = $bpoEnterpriseID;
        $self['loaDocumentID'] = $loaDocumentID;

        return $self;
    }

    /**
     * Enterprise id of an approved BPO (Business Process Outsourcer) account on your organization to authorize for this DIR.
     */
    public function withBpoEnterpriseID(string $bpoEnterpriseID): self
    {
        $self = clone $this;
        $self['bpoEnterpriseID'] = $bpoEnterpriseID;

        return $self;
    }

    /**
     * Id of the signed Letter of Authorization document (uploaded via the Telnyx Documents API) in which the Brand Owner authorizes this BPO.
     */
    public function withLoaDocumentID(string $loaDocumentID): self
    {
        $self = clone $this;
        $self['loaDocumentID'] = $loaDocumentID;

        return $self;
    }
}
