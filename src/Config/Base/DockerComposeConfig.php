<?php

declare(strict_types=1);

namespace App\Config\Base;

use App\Config\ConfigCollection;
use App\Config\InitialConfigInterface;
use App\Generator\DockerCompose\DockerComposeCiConfigInterface;
use App\Generator\DockerCompose\DockerComposeConfigInterface;
use App\Generator\DockerCompose\DockerComposeOverrideConfigInterface;
use Exception;
use Twig\Environment as Twig;

class DockerComposeConfig implements DockerComposeConfigInterface, DockerComposeCiConfigInterface, DockerComposeOverrideConfigInterface, InitialConfigInterface
{
    private Twig $twig;

    public function __construct(Twig $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @param ConfigCollection $configCollection
     *
     * @return string
     *
     * @throws Exception
     */
    public function getDockerComposeData(ConfigCollection $configCollection): string
    {
        return $this->twig->render('Config/Base/DockerCompose/docker-compose.yaml.twig');
    }

    /**
     * @param ConfigCollection $configCollection
     *
     * @return string
     *
     * @throws Exception
     */
    public function getDockerComposeCiData(ConfigCollection $configCollection): string
    {
        return $this->getDockerComposeData($configCollection);
    }

    /**
     * @param ConfigCollection $configCollection
     *
     * @return string
     *
     * @throws Exception
     */
    public function getDockerComposeOverrideData(ConfigCollection $configCollection): string
    {
        return $this->getDockerComposeData($configCollection);
    }
}
