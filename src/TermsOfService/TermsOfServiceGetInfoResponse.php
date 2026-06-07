<?php

declare(strict_types=1);

namespace Telnyx\TermsOfService;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\TermsOfService\TermsOfServiceGetInfoResponse\Agreement;

/**
 * @phpstan-import-type AgreementShape from \Telnyx\TermsOfService\TermsOfServiceGetInfoResponse\Agreement
 *
 * @phpstan-type TermsOfServiceGetInfoResponseShape = array{
 *   agreements?: list<Agreement|AgreementShape>|null
 * }
 */
final class TermsOfServiceGetInfoResponse implements BaseModel
{
    /** @use SdkModel<TermsOfServiceGetInfoResponseShape> */
    use SdkModel;

    /** @var list<Agreement>|null $agreements */
    #[Optional(list: Agreement::class)]
    public ?array $agreements;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Agreement|AgreementShape>|null $agreements
     */
    public static function with(?array $agreements = null): self
    {
        $self = new self;

        null !== $agreements && $self['agreements'] = $agreements;

        return $self;
    }

    /**
     * @param list<Agreement|AgreementShape> $agreements
     */
    public function withAgreements(array $agreements): self
    {
        $self = clone $this;
        $self['agreements'] = $agreements;

        return $self;
    }
}
