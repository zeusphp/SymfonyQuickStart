<?php

namespace Spec\Quickstart\Bundle\AppBundle\Controller;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\HttpFoundation\Response;

class DefaultControllerSpec extends ObjectBehavior
{

    function it_is_initializable(EngineInterface $templating)
    {
        $this->beConstructedWith($templating, true);
        $this->shouldHaveType('Quickstart\Bundle\AppBundle\Controller\DefaultController');
    }

    function it_builds_the_index_action(EngineInterface $templating, Response $response)
    {
        $templating->renderResponse('QuickstartAppBundle:Default:index.html.twig')
            ->shouldBeCalled()
            ->willReturn($response);
        $this->beConstructedWith($templating);

        $this->indexAction()->shouldHaveType('Symfony\Component\HttpFoundation\Response');
    }
}
