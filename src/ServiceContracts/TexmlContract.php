<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\Texml\TexmlSecretsResponse;

interface TexmlContract
{
    /**
     * @api
     *
     * @param string $name Name used as a reference for the secret, if the name already exists within the account its value will be replaced
     * @param string $value Secret value which will be used when rendering the TeXML template
     *
     * @return TexmlSecretsResponse<HasRawResponse>
     */
    public function secrets(
        $name,
        $value,
        ?RequestOptions $requestOptions = null
    ): TexmlSecretsResponse;
}
