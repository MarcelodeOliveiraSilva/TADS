--
-- PostgreSQL database dump
--

-- Dumped from database version 11.8
-- Dumped by pg_dump version 11.8

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: aluguel; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.aluguel (
    codigo integer NOT NULL,
    dataInicio character varying(40) NOT NULL,
    dataFim character varying(40) NOT NULL,
    preco money,
    situacao character varying(1),
    cliente integer NOT NULL,
    veiculo integer NOT NULL
);


ALTER TABLE public.aluguel OWNER TO postgres;

--
-- Name: aluguel_codigo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.aluguel_codigo_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.aluguel_codigo_seq OWNER TO postgres;

--
-- Name: aluguel_codigo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.aluguel_codigo_seq OWNED BY public.aluguel.codigo;


--
-- Name: cliente; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cliente (
    codigo integer NOT NULL,
    nome character varying(50) NOT NULL,
    telefone character varying(25)
);


ALTER TABLE public.cliente OWNER TO postgres;

--
-- Name: cliente_codigo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.cliente_codigo_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cliente_codigo_seq OWNER TO postgres;

--
-- Name: cliente_codigo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.cliente_codigo_seq OWNED BY public.cliente.codigo;


--
-- Name: veiculo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.veiculo (
    codigo integer NOT NULL,
    modelo character varying(40) NOT NULL,
    placa character varying(9) NOT NULL
);


ALTER TABLE public.veiculo OWNER TO postgres;

--
-- Name: veiculo_codigo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.veiculo_codigo_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.veiculo_codigo_seq OWNER TO postgres;

--
-- Name: veiculo_codigo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.veiculo_codigo_seq OWNED BY public.veiculo.codigo;


--
-- Name: aluguel codigo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.aluguel ALTER COLUMN codigo SET DEFAULT nextval('public.aluguel_codigo_seq'::regclass);


--
-- Name: cliente codigo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cliente ALTER COLUMN codigo SET DEFAULT nextval('public.cliente_codigo_seq'::regclass);


--
-- Name: veiculo codigo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.veiculo ALTER COLUMN codigo SET DEFAULT nextval('public.veiculo_codigo_seq'::regclass);


--
-- Name: aluguel aluguel_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.aluguel
    ADD CONSTRAINT aluguel_pkey PRIMARY KEY (codigo);


--
-- Name: cliente cliente_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cliente
    ADD CONSTRAINT cliente_pkey PRIMARY KEY (codigo);


--
-- Name: veiculo veiculo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.veiculo
    ADD CONSTRAINT veiculo_pkey PRIMARY KEY (codigo);


--
-- Name: aluguel clienteA; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.aluguel
    ADD CONSTRAINT "clienteA" FOREIGN KEY (cliente) REFERENCES public.cliente(codigo);


--
-- Name: aluguel veiculoA; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.aluguel
    ADD CONSTRAINT "veiculoA" FOREIGN KEY (veiculo) REFERENCES public.veiculo(codigo);


--
-- PostgreSQL database dump complete
--

