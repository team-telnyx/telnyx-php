<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Messages\Actions;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\EmailInboxes\Messages\Actions\InboxActionEmailAddressInput\UnionMember1;

/**
 * Email address accepted by inbox message actions, as a string or an object with `email` and optional `name`.
 *
 * @phpstan-import-type UnionMember1Shape from \Telnyx\EmailInboxes\Messages\Actions\InboxActionEmailAddressInput\UnionMember1
 *
 * @phpstan-type InboxActionEmailAddressInputVariants = string|UnionMember1
 * @phpstan-type InboxActionEmailAddressInputShape = InboxActionEmailAddressInputVariants|UnionMember1Shape
 */
final class InboxActionEmailAddressInput implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return ['string', UnionMember1::class];
    }
}
