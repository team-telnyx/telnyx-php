<?php

declare(strict_types=1);

namespace Telnyx\EmailValidations\EmailValidationNewResponse\Data;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailValidations\EmailValidationCheck;
use Telnyx\EmailValidations\EmailValidationNewResponse\Data\Checks\Typo;

/**
 * @phpstan-import-type EmailValidationCheckShape from \Telnyx\EmailValidations\EmailValidationCheck
 * @phpstan-import-type TypoShape from \Telnyx\EmailValidations\EmailValidationNewResponse\Data\Checks\Typo
 *
 * @phpstan-type ChecksShape = array{
 *   disposable: EmailValidationCheck|EmailValidationCheckShape,
 *   mx: EmailValidationCheck|EmailValidationCheckShape,
 *   roleBased: EmailValidationCheck|EmailValidationCheckShape,
 *   syntax: EmailValidationCheck|EmailValidationCheckShape,
 *   typo: Typo|TypoShape,
 * }
 */
final class Checks implements BaseModel
{
    /** @use SdkModel<ChecksShape> */
    use SdkModel;

    #[Required]
    public EmailValidationCheck $disposable;

    #[Required]
    public EmailValidationCheck $mx;

    #[Required('role_based')]
    public EmailValidationCheck $roleBased;

    #[Required]
    public EmailValidationCheck $syntax;

    #[Required]
    public Typo $typo;

    /**
     * `new Checks()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Checks::with(disposable: ..., mx: ..., roleBased: ..., syntax: ..., typo: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Checks)
     *   ->withDisposable(...)
     *   ->withMx(...)
     *   ->withRoleBased(...)
     *   ->withSyntax(...)
     *   ->withTypo(...)
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
     * @param EmailValidationCheck|EmailValidationCheckShape $disposable
     * @param EmailValidationCheck|EmailValidationCheckShape $mx
     * @param EmailValidationCheck|EmailValidationCheckShape $roleBased
     * @param EmailValidationCheck|EmailValidationCheckShape $syntax
     * @param Typo|TypoShape $typo
     */
    public static function with(
        EmailValidationCheck|array $disposable,
        EmailValidationCheck|array $mx,
        EmailValidationCheck|array $roleBased,
        EmailValidationCheck|array $syntax,
        Typo|array $typo,
    ): self {
        $self = new self;

        $self['disposable'] = $disposable;
        $self['mx'] = $mx;
        $self['roleBased'] = $roleBased;
        $self['syntax'] = $syntax;
        $self['typo'] = $typo;

        return $self;
    }

    /**
     * @param EmailValidationCheck|EmailValidationCheckShape $disposable
     */
    public function withDisposable(EmailValidationCheck|array $disposable): self
    {
        $self = clone $this;
        $self['disposable'] = $disposable;

        return $self;
    }

    /**
     * @param EmailValidationCheck|EmailValidationCheckShape $mx
     */
    public function withMx(EmailValidationCheck|array $mx): self
    {
        $self = clone $this;
        $self['mx'] = $mx;

        return $self;
    }

    /**
     * @param EmailValidationCheck|EmailValidationCheckShape $roleBased
     */
    public function withRoleBased(EmailValidationCheck|array $roleBased): self
    {
        $self = clone $this;
        $self['roleBased'] = $roleBased;

        return $self;
    }

    /**
     * @param EmailValidationCheck|EmailValidationCheckShape $syntax
     */
    public function withSyntax(EmailValidationCheck|array $syntax): self
    {
        $self = clone $this;
        $self['syntax'] = $syntax;

        return $self;
    }

    /**
     * @param Typo|TypoShape $typo
     */
    public function withTypo(Typo|array $typo): self
    {
        $self = clone $this;
        $self['typo'] = $typo;

        return $self;
    }
}
