<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Messages\Actions\ActionForwardParams;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Core\Conversion\ListOf;
use Telnyx\EmailInboxes\Messages\Actions\InboxActionEmailAddressInput;
use Telnyx\EmailInboxes\Messages\Actions\InboxActionEmailAddressInput\UnionMember1;

/**
 * One recipient or a non-empty recipient array. Each recipient may be an email string or an object with `email` and optional `name`.
 *
 * @phpstan-import-type UnionMember1Shape from \Telnyx\EmailInboxes\Messages\Actions\ActionForwardParams\To\UnionMember1
 * @phpstan-import-type InboxActionEmailAddressInputShape from \Telnyx\EmailInboxes\Messages\Actions\InboxActionEmailAddressInput
 *
 * @phpstan-type ToVariants = string|\Telnyx\EmailInboxes\Messages\Actions\ActionForwardParams\To\UnionMember1|list<string|UnionMember1>
 * @phpstan-type ToShape = ToVariants|UnionMember1Shape|list<InboxActionEmailAddressInputShape>
 */
final class To implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            'string',
            To\UnionMember1::class,
            new ListOf(InboxActionEmailAddressInput::class),
        ];
    }
}
