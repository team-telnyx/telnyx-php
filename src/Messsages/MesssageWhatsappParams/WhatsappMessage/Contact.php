<?php

declare(strict_types=1);

namespace Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage\Contact\Address;
use Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage\Contact\Email;
use Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage\Contact\Org;
use Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage\Contact\Phone;
use Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage\Contact\URL;

/**
 * @phpstan-type ContactShape = array{
 *   addresses?: list<Address>|null,
 *   birthday?: string|null,
 *   emails?: list<Email>|null,
 *   name?: string|null,
 *   org?: Org|null,
 *   phones?: list<Phone>|null,
 *   urls?: list<URL>|null,
 * }
 */
final class Contact implements BaseModel
{
    /** @use SdkModel<ContactShape> */
    use SdkModel;

    /** @var list<Address>|null $addresses */
    #[Optional(list: Address::class)]
    public ?array $addresses;

    #[Optional]
    public ?string $birthday;

    /** @var list<Email>|null $emails */
    #[Optional(list: Email::class)]
    public ?array $emails;

    #[Optional]
    public ?string $name;

    #[Optional]
    public ?Org $org;

    /** @var list<Phone>|null $phones */
    #[Optional(list: Phone::class)]
    public ?array $phones;

    /** @var list<URL>|null $urls */
    #[Optional(list: URL::class)]
    public ?array $urls;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Address|array{
     *   city?: string|null,
     *   country?: string|null,
     *   countryCode?: string|null,
     *   state?: string|null,
     *   street?: string|null,
     *   type?: string|null,
     *   zip?: string|null,
     * }> $addresses
     * @param list<Email|array{email?: string|null, type?: string|null}> $emails
     * @param Org|array{
     *   company?: string|null, department?: string|null, title?: string|null
     * } $org
     * @param list<Phone|array{
     *   phone?: string|null, type?: string|null, waID?: string|null
     * }> $phones
     * @param list<URL|array{type?: string|null, url?: string|null}> $urls
     */
    public static function with(
        ?array $addresses = null,
        ?string $birthday = null,
        ?array $emails = null,
        ?string $name = null,
        Org|array|null $org = null,
        ?array $phones = null,
        ?array $urls = null,
    ): self {
        $self = new self;

        null !== $addresses && $self['addresses'] = $addresses;
        null !== $birthday && $self['birthday'] = $birthday;
        null !== $emails && $self['emails'] = $emails;
        null !== $name && $self['name'] = $name;
        null !== $org && $self['org'] = $org;
        null !== $phones && $self['phones'] = $phones;
        null !== $urls && $self['urls'] = $urls;

        return $self;
    }

    /**
     * @param list<Address|array{
     *   city?: string|null,
     *   country?: string|null,
     *   countryCode?: string|null,
     *   state?: string|null,
     *   street?: string|null,
     *   type?: string|null,
     *   zip?: string|null,
     * }> $addresses
     */
    public function withAddresses(array $addresses): self
    {
        $self = clone $this;
        $self['addresses'] = $addresses;

        return $self;
    }

    public function withBirthday(string $birthday): self
    {
        $self = clone $this;
        $self['birthday'] = $birthday;

        return $self;
    }

    /**
     * @param list<Email|array{email?: string|null, type?: string|null}> $emails
     */
    public function withEmails(array $emails): self
    {
        $self = clone $this;
        $self['emails'] = $emails;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * @param Org|array{
     *   company?: string|null, department?: string|null, title?: string|null
     * } $org
     */
    public function withOrg(Org|array $org): self
    {
        $self = clone $this;
        $self['org'] = $org;

        return $self;
    }

    /**
     * @param list<Phone|array{
     *   phone?: string|null, type?: string|null, waID?: string|null
     * }> $phones
     */
    public function withPhones(array $phones): self
    {
        $self = clone $this;
        $self['phones'] = $phones;

        return $self;
    }

    /**
     * @param list<URL|array{type?: string|null, url?: string|null}> $urls
     */
    public function withURLs(array $urls): self
    {
        $self = clone $this;
        $self['urls'] = $urls;

        return $self;
    }
}
