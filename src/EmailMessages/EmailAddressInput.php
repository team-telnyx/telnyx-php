<?php

declare(strict_types=1);

namespace Telnyx\EmailMessages;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\EmailInboxes\Drafts\EmailAddress;

/**
 * @phpstan-import-type EmailAddressShape from \Telnyx\EmailInboxes\Drafts\EmailAddress
 *
 * @phpstan-type EmailAddressInputVariants = string|EmailAddress
 * @phpstan-type EmailAddressInputShape = EmailAddressInputVariants|EmailAddressShape
 */
final class EmailAddressInput implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return ['string', EmailAddress::class];
    }
}
